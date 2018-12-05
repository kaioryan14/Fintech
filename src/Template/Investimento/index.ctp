<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Investimento[]|\Cake\Collection\CollectionInterface $investimento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Investimento'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="investimento index large-9 medium-8 columns content">
    <h3><?= __('Investimento') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deposito') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_deposito') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_aceitacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_usuario') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_plano') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($investimento as $investimento): ?>
            <tr>
                <td><?= $this->Number->format($investimento->id) ?></td>
                <td><?= $this->Number->format($investimento->deposito) ?></td>
                <td><?= h($investimento->data_deposito) ?></td>
                <td><?= h($investimento->data_aceitacao) ?></td>
                <td><?= $this->Number->format($investimento->id_usuario) ?></td>
                <td><?= $this->Number->format($investimento->id_plano) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $investimento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $investimento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $investimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $investimento->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
