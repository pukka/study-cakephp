<h1>ブログ記事</h1>
<?= $this->Html->link('記事の追加', ['action' => 'add']) ?>
<table>
  <tr>
    <th>ナンバー</th>
    <th>タイトル</th>
    <th>作成日</th>
    <th>編集</th>
  </tr>
  <?php foreach ($articles as $article): ?> 
  <tr>
    <td><?= $article->id ?></td>
    <td>
      <?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?>
    </td>
    <td>
      <?= $article->created->format(DATE_RFC850) ?>
    </td>
    <td>
      <?= $this->Form->postLink(
        '削除',
        ['action' => 'delete', $article->id],
        ['confirm' => '本当に宜しいですか?'])
      ?>      
      <?= $this->Html->link('編集', ['action' => 'edit', $article->id]) ?>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
