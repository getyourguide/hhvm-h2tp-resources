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

namespace {
  interface ConstCollection extends Countable {
    public function isEmpty();

    public function count(): int;

    public function items();
  }

  interface OutputCollection {
    public function add($e);
    public function addAll($traversable);
  }
}

namespace HH {
  interface Collection extends \ConstCollection, \OutputCollection {
    public function clear();
  }

  interface Traversable {}

  interface Container extends \HH\Traversable {
  }

  interface KeyedTraversable extends \HH\Traversable {
  }

  interface KeyedContainer extends \HH\Container, \HH\KeyedTraversable {
  }

  interface Iterator extends \HH\Traversable, \Iterator {
    // This doc comment block generated by idl/sysdoc.php
    /**
     * ( excerpt from http://php.net/manual/en/iterator.current.php )
     *
     * Returns the current element.
     *
     * @return     mixed   Can return any type.
     */
    #[\ReturnTypeWillChange]
    public function current();
    // This doc comment block generated by idl/sysdoc.php
    /**
     * ( excerpt from http://php.net/manual/en/iterator.key.php )
     *
     * Returns the key of the current element.
     *
     * @return     mixed   Returns scalar on success, or NULL on failure.
     */
    public function key();
    // This doc comment block generated by idl/sysdoc.php
    /**
     * ( excerpt from http://php.net/manual/en/iterator.next.php )
     *
     * Moves the current position to the next element.
     *
     * This method is called after each foreach loop.
     *
     * @return     mixed   Any returned value is ignored.
     */
    public function next();
    // This doc comment block generated by idl/sysdoc.php
    /**
     * ( excerpt from http://php.net/manual/en/iterator.rewind.php )
     *
     * Rewinds back to the first element of the Iterator.
     *
     * This is the first method called when starting a foreach loop. It will
     * not be executed after foreach loops.
     *
     * @return     mixed   Any returned value is ignored.
     */
    public function rewind();
    // This doc comment block generated by idl/sysdoc.php
    /**
     * ( excerpt from http://php.net/manual/en/iterator.valid.php )
     *
     * This method is called after Iterator::rewind() and Iterator::next() to
     * check if the current position is valid.
     *
     * @return     mixed   The return value will be casted to boolean and then
     *                     evaluated. Returns TRUE on success or FALSE on
     *                     failure.
     */
    public function valid();
  }

  interface HHIterable extends \HH\Traversable, \IteratorAggregate {
  }

  interface KeyedIterable extends \HH\HHIterable, \HH\KeyedTraversable {
    public function mapWithKey($callback);
    public function filterWithKey($callback);
    public function keys();
  }

  interface KeyedIterator extends \HH\Iterator, \HH\KeyedTraversable {}
}


namespace {
  interface ConstSetAccess {
    public function contains($m);
  }

  interface SetAccess extends ConstSetAccess {
    public function remove($m);
  }

  interface ConstIndexAccess {
    public function at($k);
    public function get($k);
    public function containsKey($k);
  }

  interface IndexAccess extends ConstIndexAccess {
    public function set($k, $v);
    public function setAll($traversable);
    public function removeKey($k);
  }

  interface ConstMapAccess extends ConstSetAccess, ConstIndexAccess {
  }

  interface MapAccess extends ConstMapAccess,
                              SetAccess,
                              IndexAccess {
  }

  interface Stringish {
    public function __toString();
  }

  interface Indexish extends \HH\KeyedContainer {}

  interface ConstVector extends ConstCollection,
                                ConstIndexAccess,
                                \HH\KeyedIterable,
                                    Indexish {
  }

  interface MutableVector extends ConstVector,
                                  \HH\Collection,
                                  IndexAccess {
  }


  interface ConstMap extends ConstCollection,
                             ConstMapAccess,
                             \HH\KeyedIterable,
                             Indexish {
  }

  interface MutableMap extends ConstMap,
                               \HH\Collection,
                               MapAccess {
  }

  interface ConstSet extends ConstCollection,
                             ConstSetAccess,
                             \HH\KeyedIterable,
                             \HH\Container {
  }

  interface MutableSet extends ConstSet,
                               \HH\Collection,
                               SetAccess {
  }
}
