<?php declare( strict_types=1 );

/**
 * EverythingItTakes.com Plugin.
 *
 * @package   EverythingItTakes\Plugin
 * @author    Ten Adams <digital@tenadams.com>
 * @license   MIT
 * @link      https://tenadams.com/
 * @copyright 2021 Ten Adams
 */

namespace EverythingItTakes\Plugin\Domain;

/**
 * Interface Repository
 *
 * Based on brightnucleus/collection (13 Apr 2019).
 *
 * @link    https://github.com/brightnucleus/collection
 *
 * @package CMA\TestBank
 */
interface Repository {

	/**
	 * Find a single element by its ID.
	 *
	 * @param int $id ID of the element to find.
	 * @return Entity
	 */
	public function find( int $id );

	/**
	 * Find the collection of all elements the repository contains.
	 *
	 * @return Collection
	 */
	public function find_all();

	/**
	 * Find a collection of elements that fit a given set of criteria.
	 *
	 * @param array $args Arguments to query by.
	 * @return Collection
	 */
	public function find_by( array $args );

	/**
	 * Find a single element that fits a given set of criteria.
	 *
	 * @param array $args Arguments to query by.
	 * @return Entity
	 */
	public function find_one_by( array $args );
}
