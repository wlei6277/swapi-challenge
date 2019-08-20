<?php

namespace App;

class FilteredFillables {

  function __construct($fillable) {
          $this->fillable = $fillable;
  }

      
  public function filterFillableValues($data)
  {
      $filteredValues = array_filter($data,
          function ($key) {
              return in_array($key, $this->fillable);
          },
          ARRAY_FILTER_USE_KEY);
      return $filteredValues;
  }
}