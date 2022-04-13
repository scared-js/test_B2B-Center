<?php

/**
 * @property integer id
 * @property string name
 */
class User
{
    protected $attributes = [
        'id',
        'name',
    ];

    /**
     * @param array $data
     * @return void
     */
    public function create_article($data): void
    {

    }

    /**
     * @return array
     */
    public function articles(): array
    {
        return [];
    }
}