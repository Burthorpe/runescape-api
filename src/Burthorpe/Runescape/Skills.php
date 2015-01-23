<?php namespace Burthorpe\Runescape\Skills;

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
                'old_school' => true,
                'old_school_name' => 'overall',
            ],
            'attack' => [
                'id' => 1,
                'name' => 'attack',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => true,
                'members_only' => false,
                'old_school' => true,
                'old_school_name' => 'attack',
            ],
            'strength' => [
                'id' => 2,
                'name' => 'strength',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => true,
                'members_only' => false,
                'old_school' => true,
                'old_school_name' => 'strength',
            ],
            'defence' => [
                'id' => 3,
                'name' => 'defence',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => true,
                'members_only' => false,
                'old_school' => true,
                'old_school_name' => 'defence',
            ],
            'constitution' => [
                'id' => 4,
                'name' => 'constitution',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => true,
                'members_only' => false,
                'old_school' => true,
                'old_school_name' => 'hitpoints',
            ],
            'ranged' => [
                'id' => 5,
                'name' => 'ranged',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => true,
                'old_school' => true,
                'old_school_name' => 'ranged',
            ],
            'prayer' => [
                'id' => 6,
                'name' => 'prayer',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'old_school' => true,
                'old_school_name' => 'prayer',
            ],
            'magic' => [
                'id' => 7,
                'name' => 'magic',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'old_school' => true,
                'old_school_name' => 'magic',
            ],
            'cooking' => [
                'id' => 8,
                'name' => 'cooking',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => false,
                'old_school' => true,
                'old_school_name' => 'cooking',
            ],
            'woodcutting' => [
                'id' => 9,
                'name' => 'woodcutting',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => false,
                'old_school' => true,
                'old_school_name' => 'woodcutting',
            ],
            'fletching' => [
                'id' => 10,
                'name' => 'fletching',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => true,
                'old_school' => true,
                'old_school_name' => 'fletching',
            ],
            'fishing' => [
                'id' => 11,
                'name' => 'fishing',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => false,
                'old_school' => true,
                'old_school_name' => 'fishing',
            ],
            'firemaking' => [
                'id' => 12,
                'name' => 'firemaking',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => false,
                'old_school' => true,
                'old_school_name' => 'firemaking',
            ],
            'crafting' => [
                'id' => 13,
                'name' => 'crafting',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => true,
                'old_school' => true,
                'old_school_name' => 'crafting',
            ],
            'smithing' => [
                'id' => 14,
                'name' => 'smithing',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => false,
                'old_school' => true,
                'old_school_name' => 'smithing',
            ],
            'mining' => [
                'id' => 15,
                'name' => 'mining',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => false,
                'old_school' => true,
                'old_school_name' => 'mining',
            ],
            'herblore' => [
                'id' => 16,
                'name' => 'herblore',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => true,
                'old_school' => true,
                'old_school_name' => 'herblore',
            ],
            'agility' => [
                'id' => 17,
                'name' => 'agility',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => true,
                'old_school' => true,
                'old_school_name' => 'agility',
            ],
            'thieving' => [
                'id' => 18,
                'name' => 'thieving',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => true,
                'old_school' => true,
                'old_school_name' => 'thieving',
            ],
            'slayer' => [
                'id' => 19,
                'name' => 'slayer',
                'maximum_xp' => 200000000,
                'combat' => false,
                'members_only' => true,
                'old_school' => true,
                'old_school_name' => 'slayer',
            ],
            'farming' => [
                'id' => 20,
                'name' => 'farming',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => true,
                'old_school' => true,
                'old_school_name' => 'farming',
            ],
            'runecrafting' => [
                'id' => 21,
                'name' => 'runecrafting',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'old_school' => true,
                'old_school_name' => 'runecrafting',
            ],
            'hunter' => [
                'id' => 22,
                'name' => 'hunter',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => true,
                'old_school' => true,
                'old_school_name' => 'hunter',
            ],
            'construction' => [
                'id' => 23,
                'name' => 'construction',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => true,
                'old_school' => true,
                'old_school_name' => 'construction',
            ],
            'summoning' => [
                'id' => 24,
                'name' => 'summoning',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => true,
                'old_school' => false,
                'old_school_name' => null,
            ],
            'dungeoneering' => [
                'id' => 25,
                'name' => 'dungeoneering',
                'maximum_xp' => 200000000,
                'maximum_level' => 120,
                'members_only' => false,
                'old_school' => false,
                'old_school_name' => null,
            ],
            'divination' => [
                'id' => 26,
                'name' => 'divination',
                'maximum_xp' => 200000000,
                'maximum_level' => 99,
                'combat' => false,
                'members_only' => true,
                'old_school' => false,
                'old_school_name' => null,
            ],
        ]);
    }

    public function getOldSchoolSkills()
    {
        $collection = new Collection;

        $this->collection->each(function($skill) use ($collection)
        {
            if ($skill->isOldSchool())
            {
                $collection->put($skill->getName(), $skill);
            }
        });

        return $collection;
    }

    /*
     * Magic accessor to collection keys
     *
     * @return \Burthorpe\Runescape\Skills\SkillInterface
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