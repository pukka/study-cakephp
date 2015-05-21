<?php
namespace App\Controller;

use App\Controller\AppController;

class ArticlesController extends AppController
{
    /** コンストラクタのオーバライド */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }
    /** トップ画面 */
    public function index()
    {
        $articles = $this->Articles->find('all');
        $this->set(compact('articles'));
    }

    /** 記事の表示 */
    public function view($id = null)
    {
        $article = $this->Articles->get($id);
        $this->set(compact('article'));
    }

    /** 記事の追加 */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->data);
            if ( $this->Articles->save($article) ) {
                $this->Flash->success(__('記事を投稿しました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('記事を投稿できませんでした。'));
        }
        $this->set('article', $article);
    }

    /** 記事の編集 */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Articles->patchEntity($article, $this->request->data);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('記事を更新しました。'));
                return $this->redirect(['action' => 'index']);
            }
        $this->Flash->error(__('記事の更新ができませんでした。'));
        }
        $this->set('article', $article);
    }

    /** 記事の削除 */
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('記事を削除しました。'));
            return $this->redirect(['action' => 'index']);
        }
    }
}
?>
