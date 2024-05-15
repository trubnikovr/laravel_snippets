<?php

namespace App\Casts;

use App\Vo\BotSettingsVo;
use Illuminate\Contracts\Database\Eloquent\Castable;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Casts\ArrayObject;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Integer;

class BotSettingsCast implements Castable
{
  /**
   * Get the caster class to use when casting from / to this cast target.
   *
   * @param  array  $arguments
   * @return object|string
   */
  public static function castUsing(array $arguments)
  {
    return new class implements CastsAttributes
    {
      public function get($model, $key, $value, $attributes)
      {
        $currentValue = $attributes[$key] ?? null;
        $result = null;
        if($currentValue) {
          $result = $this->convertToVo(json_decode($currentValue, true));
        }

        return $currentValue ?
          new ArrayObject($result)
          : null;
      }

      public function set($model, $key, $value, $attributes)
      {
        $result = $value;
        if(is_array($result)) {
          $result = $this->convertToVo($value);
        }

        return [$key => json_encode($result)];
      }

      function convertToVo(?array $value): ?array {

        $result = null;
        if($value) {

          $result = array_map(function ($value) {
            if(is_object($value) && $value instanceof BotSettingsVo) {
              return $value;
            }
            return new BotSettingsVo($value['token'], $value['bot_name'], $value['status']);
          }, $value);
        }

        return $result;
      }

    };
  }
}
