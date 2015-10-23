<?php

namespace Burthorpe\Runescape\RS3\Stats;

use Burthorpe\Runescape\RS3\Skills\Repository as SkillsRepository;
use Illuminate\Support\Collection;

class Repository extends Collection
{
    /**
     * Creates an \Burthorpe\Runescape\RS3\Stats\Repository instance from a raw feed directly from Jagex
     *
     * @param $rawFeed string Raw feed directly from Jagex
     * @return \Burthorpe\Runescape\RS3\Stats\Repository
     */
    public static function factory($rawFeed)
    {
        $repository = new static;
        $skills = new SkillsRepository();

        $exploded = explode("\n", $rawFeed);

        $spliced = array_splice(
            $exploded,
            0,
            $skills->count()
        );

        for($id = 0; $id < count($spliced); $id++)
        {
            list($rank, $level, $experience) = explode(',', $spliced[$id]);
            $skill = $skills->find($id);

            $repository->push(
                new Stat(
                    $skill,
                    $level,
                    $rank,
                    $experience
                )
            );
        }

        return $repository;
    }

    /**
     * Find a stat by the given skill ID
     *
     * @param $id
     * @return \Burthorpe\Runescape\RS3\Stats\Contract|null
     */
    public function find($id)
    {
        return $this->filter(function(Contract $stat) use ($id) {
            return $stat->getSkill()->getId() === $id;
        })->first();
    }

    /**
     * Find a stat by the given skill name
     *
     * @param $name
     * @return \Burthorpe\Runescape\RS3\Stats\Contract|null
     */
    public function findByName($name)
    {
        return $this->filter(function(Contract $stat) use ($name) {
            return $stat->getSkill()->getName() === $name;
        })->first();
    }

    /**
     * Find a stat by the given skill class
     *
     * @param $class
     * @return \Burthorpe\Runescape\RS3\Stats\Contract|null
     */
    public function findByClass($class)
    {
        return $this->filter(function(Contract $stat) use ($class) {
            return $stat->getSkill() instanceof $class;
        })->first();
    }
}