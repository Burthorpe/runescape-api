<?php

namespace Burthorpe\Runescape\RS3;

use Illuminate\Support\Collection;

/**
 * @method integer count()
 * @method \Illuminate\Support\Collection each(\Closure $callback)
 */
class Skills
{
    /**
     * Collection of the Skill classes
     *
     * @var \Illuminate\Support\Collection
     */
    protected $collection;

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->collection = new Collection([
            'overall' => new Collection([
                'id'            => 0,
                'name'          => 'overall',
                'maximum_xp'    => 5200000000,
                'maximum_level' => 2595,
                'combat'        => false,
                'members_only'  => false,
            ]),
            'attack' => new Collection([
                'id'            => 1,
                'name'          => 'attack',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => true,
                'members_only'  => false,
            ]),
            'defence' => new Collection([
                'id'            => 2,
                'name'          => 'defence',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => true,
                'members_only'  => false,
            ]),
            'strength' => new Collection([
                'id'            => 3,
                'name'          => 'strength',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => true,
                'members_only'  => false,
            ]),
            'constitution' => new Collection([
                'id'            => 4,
                'name'          => 'constitution',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => true,
                'members_only'  => false,
            ]),
            'ranged' => new Collection([
                'id'            => 5,
                'name'          => 'ranged',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => true,
            ]),
            'prayer' => new Collection([
                'id'            => 6,
                'name'          => 'prayer',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => false,
            ]),
            'magic' => new Collection([
                'id'            => 7,
                'name'          => 'magic',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => false,
            ]),
            'cooking' => new Collection([
                'id'            => 8,
                'name'          => 'cooking',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => false,
                'members_only'  => false,
            ]),
            'woodcutting' => new Collection([
                'id'            => 9,
                'name'          => 'woodcutting',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => false,
                'members_only'  => false,
            ]),
            'fletching' => new Collection([
                'id'            => 10,
                'name'          => 'fletching',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => false,
                'members_only'  => true,
            ]),
            'fishing' => new Collection([
                'id'            => 11,
                'name'          => 'fishing',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => false,
                'members_only'  => false,
            ]),
            'firemaking' => new Collection([
                'id'            => 12,
                'name'          => 'firemaking',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => false,
                'members_only'  => false,
            ]),
            'crafting' => new Collection([
                'id'            => 13,
                'name'          => 'crafting',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => false,
                'members_only'  => true,
            ]),
            'smithing' => new Collection([
                'id'            => 14,
                'name'          => 'smithing',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => false,
                'members_only'  => false,
            ]),
            'mining' => new Collection([
                'id'            => 15,
                'name'          => 'mining',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => false,
                'members_only'  => false,
            ]),
            'herblore' => new Collection([
                'id'            => 16,
                'name'          => 'herblore',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => false,
                'members_only'  => true,
            ]),
            'agility' => new Collection([
                'id'            => 17,
                'name'          => 'agility',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => false,
                'members_only'  => true,
            ]),
            'thieving' => new Collection([
                'id'            => 18,
                'name'          => 'thieving',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => false,
                'members_only'  => true,
            ]),
            'slayer' => new Collection([
                'id'           => 19,
                'name'         => 'slayer',
                'maximum_xp'   => 200000000,
                'combat'       => false,
                'members_only' => true,
            ]),
            'farming' => new Collection([
                'id'            => 20,
                'name'          => 'farming',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => false,
                'members_only'  => true,
            ]),
            'runecrafting' => new Collection([
                'id'            => 21,
                'name'          => 'runecrafting',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => false,
            ]),
            'hunter' => new Collection([
                'id'            => 22,
                'name'          => 'hunter',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => false,
                'members_only'  => true,
            ]),
            'construction' => new Collection([
                'id'            => 23,
                'name'          => 'construction',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => false,
                'members_only'  => true,
            ]),
            'summoning' => new Collection([
                'id'            => 24,
                'name'          => 'summoning',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => false,
                'members_only'  => true,
            ]),
            'dungeoneering' => new Collection([
                'id'            => 25,
                'name'          => 'dungeoneering',
                'maximum_xp'    => 200000000,
                'maximum_level' => 120,
                'members_only'  => false,
            ]),
            'divination' => new Collection([
                'id'            => 26,
                'name'          => 'divination',
                'maximum_xp'    => 200000000,
                'maximum_level' => 99,
                'combat'        => false,
                'members_only'  => true,
            ]),
        ]);
    }

    /**
     * Gets a skill by the Jagex ID
     *
     * @param  int                            $id
     * @return \Illuminate\Support\Collection
     */
    public function getById($id)
    {
        return $this->collection->where('id', $id)->first();
    }

    /**
     * Get a skill by the name
     *
     * @param  string                         $name
     * @return \Illuminate\Support\Collection
     */
    public function getByName($name)
    {
        return $this->collection->where('name', $name)->first();
    }

    /**
     * Magic accessor to collection keys
     */
    public function __get($key)
    {
        return $this->collection->get($key);
    }

    /**
     * Magic access to collection methods
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->collection, $method], $parameters);
    }
}
