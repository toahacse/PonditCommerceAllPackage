<?php

namespace Pondit\PonditCommerce\ProductTag\Http\Traits;

trait EntitySequenceHandler
{
    public function updateSequence($sequence, $parent = null)
    {
        $oldSequence   =   (int) $this->sequence_number;
        $newSequence   =   (int) $sequence;

        if ($oldSequence < $newSequence)
        {
            if (!is_null($parent))
            {
                $parentKey  =   array_key_first($parent);
                $parentId   =   $parent[$parentKey];

                $records    =   $this->where($parentKey, $parentId)
                                    ->whereBetween('sequence_number', [$oldSequence + 1, $sequence])
                                    ->orderBy('sequence_number', 'desc')
                                    ->get();
            } else
            {
                $records   =   $this->whereBetween('sequence_number', [$oldSequence + 1, $sequence])
                                    ->orderBy('sequence_number', 'desc')
                                    ->get();
            }

            foreach ($records as $record)
            {
                $record->sequence_number = --$sequence;
                
                $record->save();
            }
        } elseif ($oldSequence > $newSequence)
        {
            if (!is_null($parent))
            {
                $parentKey  =   array_key_first($parent);
                $parentId   =   $parent[$parentKey];

                $records    =   $this->where($parentKey, $parentId)
                                    ->whereBetween('sequence_number', [$sequence, $oldSequence - 1])
                                    ->orderBy('sequence_number', 'ASC')
                                    ->get();
            } else
            {
                $records    =   $this->whereBetween('sequence_number', [$sequence, $oldSequence - 1])
                                    ->orderBy('sequence_number', 'ASC')
                                    ->get();
            }

            foreach ($records as $record)
            {
                $record->sequence_number    =   ++$sequence;

                $record->save();
            }
        }

        $this->sequence_number  =   $newSequence;

        $this->save();
    }

    public function updateSequenceOnDelete($sequence, $parent = null)
    {
        if (!is_null($parent))
        {
            $parentKey  =   array_key_first($parent);
            $parentId   =   $parent[$parentKey];

            $records    =   $this->where($parentKey, $parentId)
                                ->where('sequence_number', '>', $sequence)
                                ->orderBy('sequence_number', 'ASC')
                                ->get();
        } else
        {
            $records    =   $this->where('sequence_number', '>', $sequence)
                                ->orderBy('sequence_number', 'ASC')
                                ->get();
        }

        foreach ($records as $record)
        {
            $record->sequence_number    =   $sequence++;

            $record->save();
        }
    }
}
