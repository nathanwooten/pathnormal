<?php

/**
 * Copyright Nathan Wooten 2023
 * MIT License
 */

namespace nathanwooten\pathnormal;

class PathNormal
{

  public static array $normal = [];

  public function __invoke( $normalize, $before = null, $after = null, $separator = null, $name = null )
  {  

    $path = $normalize;

    if ( array_key_exists( $name, static::$normal ) ) {
      return static::$normal[ $name ];
    }

    if ( null !== $separator ) {
      $path = str_replace( [ '\\', '/' ], $separator, $path );
    }

    if ( null !== $before ) {
      $path = ltrim( $path, $separator . '\\' . '/' );
      if ( ! empty( $before ) && null !== $separator ) {
        $before = $separator;
      }
      $path = $before . $path;
    }

    if ( null !== $after ) {
      $path = rtrim( $path, $separator . '\\' . '/' );
      if ( ! empty( $after ) && null !== $separator ) {
        $after = $separator;
      }
      $path .= $after;
    }

    $this->set( $path, $name );

    return $path;

  }

  public function set( $path, $name = null )
  {

    if ( null !== $name ) {
      $this->normal[ $name ] = $path;
    }

  }

  public function get( $name )
  {

    return array_key_exists( $name, static::$normal ) ? static::$normal[ $name ] : null;

  }

}
}
