<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plano $plano
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $plano->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $plano->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Plano'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="plano form large-9 medium-8 columns content">
    <?= $this->Form->create($plano) ?>
    <fieldset>
        <legend><?= __('Edit Plano') ?></legend>
        <?php
            echo $this->Form->control('plano');
            echo $this->Form->control('periodo');
            echo $this->Form->control('taxa_mensal');
            echo $this->Form->control('coletivo');
            echo $this->Form->control('ativo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
