<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Investimento Entity
 *
 * @property int $id
 * @property float $deposito
 * @property \Cake\I18n\FrozenTime $data_deposito
 * @property \Cake\I18n\FrozenTime $data_aceitacao
 * @property int $id_usuario
 * @property int $id_plano
 * @property bool $aceito
 */
class Investimento extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'deposito' => true,
        'data_deposito' => true,
        'data_aceitacao' => true,
        'id_usuario' => true,
        'id_plano' => true,
        'aceito' => true
    ];
}
