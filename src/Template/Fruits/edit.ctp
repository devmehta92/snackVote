<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fruit $fruit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fruit->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fruit->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fruits'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Votes'), ['controller' => 'Votes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vote'), ['controller' => 'Votes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fruits form large-9 medium-8 columns content">
    <?= $this->Form->create($fruit) ?>
    <fieldset>
        <legend><?= __('Edit Fruit') ?></legend>
        <?php
            echo $this->Form->control('Name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
