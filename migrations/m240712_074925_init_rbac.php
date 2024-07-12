<?php

use yii\db\Migration;

/**
 * Class m240712_074925_init_rbac
 */
class m240712_074925_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        // Add roles
        $admin = $auth->createRole('admin');
        $auth->add($admin);

        $user = $auth->createRole('user');
        $auth->add($user);

        // Add permissions
        $manageUsers = $auth->createPermission('manageUsers');
        $manageUsers->description = 'Manage Users';
        $auth->add($manageUsers);

        // Assign permissions to roles
        $auth->addChild($admin, $manageUsers);

        // Assign roles to users
        $auth->assign($admin, 1); // Assuming user with ID 1 is the admin
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        // Remove all roles and permissions
        $auth->removeAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240712_074925_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
