<?php

// The Unlicense, PUBLIC DOMAIN

if ( ! function_exists( 'pathNormal' ) ) {
function pathNormal( $path, $before = null, $after = null, $separator = null )
{  
  
  if ( null !== $separator ) {
    $path = str_replace( [ '\\', '/' ], $separator, $path );
  }

  if ( null !== $before ) {
    $path = ltrim( $path, $separator . '\\' . '/' );
    if ( null !== $separator ) {
      $before = $separator;
    }
    $path = $before . $path;
  }

  if ( null !== $after ) {
    $path = rtrim( $path, $separator . '\\' . '/' );
    if ( null !== $separator ) {
      $after = $separator;
    }
    $path .= $after;
  }

  return $path;

}
}
