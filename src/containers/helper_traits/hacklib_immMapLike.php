<?php
/**
 * Copyright (c) 2014, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the BSD-style license found in the
 * LICENSE file in the "hack" directory of this source tree. An additional grant
 * of patent rights can be found in the PATENTS file in the same directory.
 *
 */

namespace HH {
  require_once(__DIR__.SEP.'hacklib_constMapLike.php');
  require_once(__DIR__.SEP.'hacklib_commonImmMutableContainerMethods.php');

  trait HACKLIB_ImmMapLike {
    use HACKLIB_ConstMapLike;
    use HACKLIB_CommonImmMutableContainerMethods;

    /**
     * identical to at, implemented for ArrayAccess
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset) {
      list($contained, $k_actual) = $this->hacklib_containsKey($offset);
      if ($contained) {
        return $this->container[$k_actual];
      }
      if (is_int($offset)) {
        throw new \OutOfBoundsException("Integer key $offset is not defined");
      } else {
        if (strlen($offset) > 100) {
          $offset = "\"".substr($offset, 0, 100)."\""." (truncated)";
        } else {
          $offset = "\"$offset\"";
        }
        throw new \OutOfBoundsException("String key $offset is not defined");
      }
    }

    public function offsetSet($offset, $value): void
    {
      throw new \InvalidOperationException(
        'Cannot modify immutable object of type ' . get_class($this));
    }

    public function offsetUnset($offset): void
    {
      throw new \InvalidOperationException(
        'Cannot modify immutable object of type ' . get_class($this));
    }

    public function immutable()
    {
      return $this;
    }

    protected function hacklib_isImmutable()
    {
      return true;
    }
  }
}
