<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Investimento $investimento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Investimento'), ['action' => 'edit', $investimento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Investimento'), ['action' => 'delete', $investimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $investimento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Investimento'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Investimento'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="investimento view large-9 medium-8 columns content">
    <h3><?= h($investimento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($investimento->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deposito') ?></th>
            <td><?= $this->Number->format($investimento->deposito) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Usuario') ?></th>
            <td><?= $this->Number->format($investimento->id_usuario) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Plano') ?></th>
            <td><?= $this->Number->format($investimento->id_plano) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Deposito') ?></th>
            <td><?= h($investimento->data_deposito) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Aceitacao') ?></th>
            <td><?= h($investimento->data_aceitacao) ?></td>
        </tr>
    </table>
</div>
