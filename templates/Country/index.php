<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Country> $country
 */
?>
<div class="country index content">
    <?= $this->Html->link(__('New Country'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Country') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('country') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($country as $country): ?>
                <tr>
                    <td><?= $this->Number->format($country->id) ?></td>
                    <td><?= $country->has('user') ? $this->Html->link($country->user->name, ['controller' => 'Users', 'action' => 'view', $country->user->id]) : '' ?></td>
                    <td><?= h($country->country) ?></td>
                    <td><?= h($country->created_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $country->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $country->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $country->id], ['confirm' => __('Are you sure you want to delete # {0}?', $country->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
