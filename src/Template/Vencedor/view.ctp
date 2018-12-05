<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vencedor $vencedor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vencedor'), ['action' => 'edit', $vencedor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vencedor'), ['action' => 'delete', $vencedor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vencedor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vencedor'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vencedor'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vencedor view large-9 medium-8 columns content">
    <h3><?= h($vencedor->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($vencedor->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Usuario') ?></th>
            <td><?= $this->Number->format($vencedor->id_usuario) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Plano') ?></th>
            <td><?= $this->Number->format($vencedor->id_plano) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mes') ?></th>
            <td><?= $this->Number->format($vencedor->mes) ?></td>
        </tr>
    </table>
</div>
