<?php

namespace Abdelhafz\TransAccessor;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;

trait Translatable
{
    private $dir;
    private $langs;

   protected  function initializeTranslatable()
    {
        $this->dir = App::langPath();
        $this->langs = array_diff(scandir($this->dir), array('..', '.'));
        if (!empty($this->translatable) && is_array($this->translatable)) {
            foreach ($this->translatable as $column) {
                foreach ($this->langs as $lang) {
                    $this->hidden[] = $column . '_' . $lang;
                }
            }
            $this->appends = array_unique(array_merge($this->appends, $this->translatable));
        }
    }


    protected function mutateAttribute($key, $value)
    {
        if (!in_array($key, $this->translatable)) {
            $value = parent::mutateAttribute($key, $value);
        } elseif (method_exists($this, 'get' . Str::studly($key) . 'Attribute')) {
            $value = parent::mutateAttribute($key, $value);
        }
        return $this->applyAccessors($key, $value);
    }

    protected function applyAccessors($key, $value)
    {
        return $this->getAttributeValue($key . '_' . app()->getLocale());
    }
}
