<?php
namespace App\Traits;

trait EnumHelpers
{
    /**
     * Возвращает все имена кейсов enum.
     *
     * @return array
     */
    public static function getNames(): array
    {
        return array_map(fn($case) => $case->name, static::cases());
    }

    /**
     * Возвращает все значения кейсов enum.
     *
     * @return array
     */
    public static function getValues(): array
    {
        return array_map(fn($case) => $case->value, static::cases());
    }

    /**
     * Преобразует enum в ассоциативный массив, где ключи - это имена, а значения - соответствующие значения enum.
     *
     * @return array
     */
    public static function toArray(): array
    {
        return array_combine(static::getNames(), static::getValues());
    }

}
