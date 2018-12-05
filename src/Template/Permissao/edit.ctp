<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permissao $permissao
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $permissao->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $permissao->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Permissao'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="permissao form large-9 medium-8 columns content">
    <?= $this->Form->create($permissao) ?>
    <fieldset>
        <legend><?= __('Edit Permissao') ?></legend>
        <?php
            echo $this->Form->control('permissao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
