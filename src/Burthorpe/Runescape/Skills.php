<?php namespace Burthorpe\Runescape;

use Illuminate\Support\Collection;

class Skills {

    /*
     * Collection of the Skill classes
     *
     * @var \Illuminate\Support\Collection
     */
    protected $collection;

    /*
     * Class constructor
     */
    public function __construct()
    {
        $this->collection = new Collection([
            'overall' => [
                'id' => 0,
                'name' => 'overall',
                'maximum_xp' => 5200000000,
                'maximum_level' => 2595,
                'combat' => false,
                'members_only' => false,
            ],
            'attack' => [
                'id' => 1,
                'name' => 'attack',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => true,
                'members_only' => false,
            ],
            'strength' => [
                'id' => 2,
                'name' => 'strength',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => true,
                'members_only' => false,
            ],
            'defence' => [
                'id' => 3,
                'name' => 'defence',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => true,
                'members_only' => false,
            ],
            'constitution' => [
                'id' => 4,
                'name' => 'constitution',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => true,
                'members_only' => false,
            ],
            'ranged' => [
                'id' => 5,
                'name' => 'ranged',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => true,
            ],
            'prayer' => [
                'id' => 6,
                'name' => 'prayer',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
            ],
            'magic' => [
                'id' => 7,
                'name' => 'magic',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
            ],
            'cooking' => [
                'id' => 8,
                'name' => 'cooking',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => false,
            ],
            'woodcutting' => [
                'id' => 9,
                'name' => 'woodcutting',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => false,
            ],
            'fletching' => [
                'id' => 10,
                'name' => 'fletching',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => true,
            ],
            'fishing' => [
                'id' => 11,
                'name' => 'fishing',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => false,
            ],
            'firemaking' => [
                'id' => 12,
                'name' => 'firemaking',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => false,
            ],
            'crafting' => [
                'id' => 13,
                'name' => 'crafting',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => true,
            ],
            'smithing' => [
                'id' => 14,
                'name' => 'smithing',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => false,
            ],
            'mining' => [
                'id' => 15,
                'name' => 'mining',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => false,
            ],
            'herblore' => [
                'id' => 16,
                'name' => 'herblore',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => true,
            ],
            'agility' => [
                'id' => 17,
                'name' => 'agility',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => true,
            ],
            'thieving' => [
                'id' => 18,
                'name' => 'thieving',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => true,
            ],
            'slayer' => [
                'id' => 19,
                'name' => 'slayer',
                'maximum_xp' => 200000000,
                'combat' => false,
                'members_only' => true,
            ],
            'farming' => [
                'id' => 20,
                'name' => 'farming',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => true,
            ],
            'runecrafting' => [
                'id' => 21,
                'name' => 'runecrafting',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
            ],
            'hunter' => [
                'id' => 22,
                'name' => 'hunter',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => true,
            ],
            'construction' => [
                'id' => 23,
                'name' => 'construction',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => true,
            ],
            'summoning' => [
                'id' => 24,
                'name' => 'summoning',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => true,
            ],
            'dungeoneering' => [
                'id' => 25,
                'name' => 'dungeoneering',
                'maximum_xp' => 200000000,
                'maximum_level' => 120,
                'members_only' => false,
            ],
            'divination' => [
                'id' => 26,
                'name' => 'divination',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => true,
            ],
        ]);
    }

    /*
     * Gets a skill by the Jagex ID
     *
     * @param integer $id
     * @return \Illuminate\Support\Collection
     */
    public function getById($id)
    {
        return $this->collection->where('id', $id);
    }

    /*
     * Get a skill by the name
     *
     * @param string $name
     * @return \Illuminate\Support\Collection
     */
    public function getByName($name)
    {
        return $this->collection->where('name', $name);
    }

    /*
     * Magic accessor to collection keys
     */
    public function __get($key)
    {
        return $this->collection->get($key);
    }

    /*
     * Magic access to collection methods
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->collection, $method], $parameters);
    }

}