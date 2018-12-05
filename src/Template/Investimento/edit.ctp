<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Investimento $investimento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $investimento->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $investimento->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Investimento'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="investimento form large-9 medium-8 columns content">
    <?= $this->Form->create($investimento) ?>
    <fieldset>
        <legend><?= __('Edit Investimento') ?></legend>
        <?php
            echo $this->Form->control('deposito');
            echo $this->Form->control('data_deposito');
            echo $this->Form->control('data_aceitacao', ['empty' => true]);
            echo $this->Form->control('id_usuario');
            echo $this->Form->control('id_plano');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
