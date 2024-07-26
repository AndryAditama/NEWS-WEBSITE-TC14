<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
   /**
    * Transform the resource collection into an array.
    *
    * @return array<int|string, mixed>
    */

   public $status;
   public $message;
   public $resource;

   public function __construct($status, $message, $resource)
   {
      parent::__construct($resource);
      $this->status  = $status;
      $this->message = $message;
   }

   public function toArray(Request $request): array
   {
      return [
         'success'   => $this->status,
         'message'   => $this->message,
         'data'      => $this->resource
      ];
   }
}
