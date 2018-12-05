<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Usuario Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $senha
 * @property \Cake\I18n\FrozenDate $data_nascimento
 * @property string $cpf
 * @property string $telefone
 * @property bool $ativo
 * @property int $id_permissao
 *
 * @property \App\Model\Entity\Permissao $permissao
 */
class Usuario extends Entity
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
        'nome' => true,
        'email' => true,
        'senha' => true,
        'data_nascimento' => true,
        'cpf' => true,
        'telefone' => true,
        'ativo' => true,
        'id_permissao' => true,
        'permissao' => true
    ];
}
