<h1>記事の追加</h1>
<?php
    /** <form method="post" action="/articles/add"> */
    echo $this->Form->create($article);
    echo $this->Form->input('title');
    echo $this->Form->input('body', ['rows' => '3']);
    echo $this->Form->button(__('投稿'));
    echo $this->Form->end();
?>
