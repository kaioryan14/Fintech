<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permissao $permissao
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Permissao'), ['action' => 'edit', $permissao->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Permissao'), ['action' => 'delete', $permissao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permissao->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Permissao'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permissao'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="permissao view large-9 medium-8 columns content">
    <h3><?= h($permissao->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Permissao') ?></th>
            <td><?= h($permissao->permissao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($permissao->id) ?></td>
        </tr>
    </table>
</div>
