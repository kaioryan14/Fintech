<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Plano Entity
 *
 * @property int $id
 * @property string $plano
 * @property int $periodo
 * @property float $taxa_mensal
 * @property bool $coletivo
 * @property bool $ativo
 * @property string $conta
 * @property string $agencia
 * @property string $banco
 */
class Plano extends Entity
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
        'plano' => true,
        'periodo' => true,
        'taxa_mensal' => true,
        'coletivo' => true,
        'ativo' => true,
        'conta' => true,
        'agencia' => true,
        'banco' => true
    ];
}
