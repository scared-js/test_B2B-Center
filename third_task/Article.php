<?php

/**
 * @property integer id
 * @property integer user_id
 */
class Article
{
    protected $attributes = [
        'id',
        'user_id',
    ];

    /**
     * @return User
     */
    public function user(): User
    {
        return new User();
    }

    /**
     * @param User $user
     * @return void
     */
    public function change_user($user): void
    {

    }
}