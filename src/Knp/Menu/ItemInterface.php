<?php

namespace Knp\Menu;

/**
 * Interface implemented by a menu item.
 *
 * It roughly represents a single <li> tag and is what you should interact with
 * most of the time by default.
 * Originally taken from ioMenuPlugin (http://github.com/weaverryan/ioMenuPlugin)
 */
interface ItemInterface extends  \ArrayAccess, \Countable, \IteratorAggregate
{
    /**
     * @return string
     */
    function getName();

    /**
     * Provides a fluent interface
     *
     * @param  string $name
     * @return \Knp\Menu\ItemInterface
     */
    function setName($name);

    /**
     * Get the uri for a menu item
     *
     * @return string
     */
    function getUri();

    /**
     * Set the uri for a menu item
     *
     * Provides a fluent interface
     *
     * @param  string $uri The uri to set on this menu item
     * @return \Knp\Menu\ItemInterface
     */
    function setUri($uri);

    /**
     * Returns the label that will be used to render this menu item
     *
     * Defaults to the name of no label was specified
     *
     * @return string
     */
    function getLabel();

    /**
     * Provides a fluent interface
     *
     * @param  string $label    The text to use when rendering this menu item
     * @return \Knp\Menu\ItemInterface
     */
    function setLabel($label);

    /**
     * @return array
     */
    function getAttributes();

    /**
     * Provides a fluent interface
     *
     * @param  array $attributes
     * @return \Knp\Menu\ItemInterface
     */
    function setAttributes(array $attributes);

    /**
     * @param  string $name     The name of the attribute to return
     * @param  mixed  $default  The value to return if the attribute doesn't exist
     * @return mixed
     */
    function getAttribute($name, $default = null);

    /**
     * Provides a fluent interface
     *
     * @param string $name
     * @param mixed $value
     * @return \Knp\Menu\ItemInterface
     */
    function setAttribute($name, $value);

    /**
     * @return array
     */
    function getLinkAttributes();

    /**
     * Provides a fluent interface
     *
     * @param  array $linkAttributes
     * @return \Knp\Menu\ItemInterface
     */
    function setLinkAttributes(array $linkAttributes);

    /**
     * @param  string $name     The name of the attribute to return
     * @param  mixed  $default  The value to return if the attribute doesn't exist
     * @return mixed
     */
    function getLinkAttribute($name, $default = null);

    /**
     * Provides a fluent interface
     *
     * @param string $name
     * @param string $value
     * @return \Knp\Menu\ItemInterface
     */
    function setLinkAttribute($name, $value);

    /**
     * @return array
     */
    function getLabelAttributes();

    /**
     * Provides a fluent interface
     *
     * @param  array $labelAttributes
     * @return \Knp\Menu\ItemInterface
     */
    function setLabelAttributes(array $labelAttributes);

    /**
     * @param  string $name     The name of the attribute to return
     * @param  mixed  $default  The value to return if the attribute doesn't exist
     * @return mixed
     */
    function getLabelAttribute($name, $default = null);

    /**
     * Provides a fluent interface
     *
     * @param string $name
     * @param mixed $value
     * @return \Knp\Menu\ItemInterface
     */
    function setLabelAttribute($name, $value);

    /**
     * Whether or not this menu item should show its children.
     *
     * @return bool
     */
    function getShowChildren();

    /**
     * Set whether or not this menu item should show its children
     *
     * Provides a fluent interface
     *
     * @param bool $bool
     * @return \Knp\Menu\ItemInterface
     */
    function setShowChildren($bool);

    /**
     * @return bool Whether or not to show this menu item
     */
    function getShow();

    /**
     * Set whether or not this menu to show this menu item
     *
     * Provides a fluent interface
     *
     * @param bool $bool
     * @return \Knp\Menu\ItemInterface
     */
    function setShow($bool);

    /**
     * Whether or not this menu item should be rendered or not based on all the available factors
     *
     * @return boolean
     */
    function shouldBeRendered();

    /**
     * Whether or not this menu item should be rendered as a link based on the available factors
     *
     * @return boolean
     */
    function shouldBeRenderedAsLink();

    /**
     * Add a child menu item to this menu
     *
     * Provides a fluent interface
     *
     * @param mixed   $child    An MenuItem object or the name of a new menu to create
     * @param string  $uri    If creating a new menu, the uri for that menu
     * @param array  $attributes  If creating a new menu, the attributes for that menu
     * @return \Knp\Menu\ItemInterface The child menu item
     */
    function addChild($child, $uri = null, array $attributes = array());

    /**
     * Returns the child menu identified by the given name
     *
     * @param  string $name  Then name of the child menu to return
     * @return \Knp\Menu\ItemInterface|null
     */
    function getChild($name);

    /**
     * Moves child to specified position. Rearange other children accordingly.
     *
     * Provides a fluent interface
     *
     * @param integer $position Position to move child to.
     * @return \Knp\Menu\ItemInterface
     */
    function moveToPosition($position);

    /**
     * Moves child to specified position. Rearange other children accordingly.
     *
     * Provides a fluent interface
     *
     * @param \Knp\Menu\ItemInterface $child Child to move.
     * @param integer $position Position to move child to.
     * @return \Knp\Menu\ItemInterface
     */
    function moveChildToPosition(ItemInterface $child, $position);

    /**
     * Moves child to first position. Rearange other children accordingly.
     *
     * Provides a fluent interface
     *
     * @return \Knp\Menu\ItemInterface
     */
    function moveToFirstPosition();

    /**
     * Moves child to last position. Rearange other children accordingly.
     *
     * Provides a fluent interface
     *
     * @return \Knp\Menu\ItemInterface
     */
    function moveToLastPosition();

    /**
     * Reorder children.
     *
     * Provides a fluent interface
     *
     * @param array $order New order of children.
     * @return \Knp\Menu\ItemInterface
     */
    function reorderChildren($order);

    /**
     * Makes a deep copy of menu tree. Every item is copied as another object.
     *
     * @return \Knp\Menu\ItemInterface
     */
    function copy();

    /**
     * Get slice of menu as another menu.
     *
     * If offset and/or length are numeric, it works like in array_slice function:
     *
     *   If offset is non-negative, slice will start at the offset.
     *   If offset is negative, slice will start that far from the end.
     *
     *   If length is null, slice will have all elements.
     *   If length is positive, slice will have that many elements.
     *   If length is negative, slice will stop that far from the end.
     *
     * It's possible to mix names/object/numeric, for example:
     *   slice("child1", 2);
     *   slice(3, $child5);
     *
     * @param mixed $offset Name of child, child object, or numeric offset.
     * @param mixed $length Name of child, child object, or numeric length.
     * @return \Knp\Menu\ItemInterface
     */
    function slice($offset, $length = 0);

    /**
     * Split menu into two distinct menus.
     *
     * @param mixed $length Name of child, child object, or numeric length.
     * @return array Array with two menus, with "primary" and "secondary" key
     */
    function split($length);

    /**
     * Returns the level of this menu item
     *
     * The root menu item is 0, followed by 1, 2, etc
     *
     * @return integer
     */
    function getLevel();

    /**
     * Returns the root ItemInterface of this menu tree
     *
     * @return \Knp\Menu\ItemInterface
     */
    function getRoot();

    /**
     * Returns whether or not this menu item is the root menu item
     *
     * @return bool
     */
    function isRoot();

    /**
     * @return MenuItem|null
     */
    function getParent();

    /**
     * Used internally when adding and removing children
     *
     * Provides a fluent interface
     *
     * @param \Knp\Menu\ItemInterface|null $parent
     * @return \Knp\Menu\ItemInterface
     */
    function setParent(ItemInterface $parent = null);

    /**
     * Return the children as an array of ItemInterface objects
     *
     * @return array
     */
    function getChildren();

    /**
     * Provides a fluent interface
     *
     * @param  array $children An array of ItemInterface objects
     * @return \Knp\Menu\ItemInterface
     */
    function setChildren(array $children);

    /**
     * Removes a child from this menu item
     *
     * Provides a fluent interface
     *
     * @param mixed $name The name of ItemInterface instance or the ItemInterface to remove
     * @return \Knp\Menu\ItemInterface
     */
    function removeChild($name);

    /**
     * @return \Knp\Menu\ItemInterface
     */
    function getFirstChild();

    /**
     * @return \Knp\Menu\ItemInterface
     */
    function getLastChild();

    /**
     * Returns whether or not this menu items has viewable children
     *
     * This menu MAY have children, but this will return false if the current
     * user does not have access to view any of those items
     *
     * @return boolean
     */
    function hasChildren();

    /**
     * A string representation of this menu item
     *
     * e.g. Top Level > Second Level > This menu
     *
     * @param string $separator
     * @return string
     */
    function getPathAsString($separator = ' > ');

    /**
     * Renders an array of label => uri pairs ready to be used for breadcrumbs.
     *
     * The subItem can be one of the following forms
     *   * 'subItem'
     *   * array('subItem' => '@homepage')
     *   * array('subItem1', 'subItem2')
     *
     * @example
     * // drill down to the Documentation menu item, then add "Chapter 1" to the breadcrumb
     * $arr = $menu['Documentation']->getBreadcrumbsArray('Chapter 1');
     * foreach ($arr as $name => $url)
     * {
     *
     * }
     *
     * @param  mixed $subItem A string or array to append onto the end of the array
     * @return array
     */
    function getBreadcrumbsArray($subItem = null);

    /**
     * Returns the current menu item if it is a child of this menu item
     *
     * @return bool|\Knp\Menu\ItemInterface
     */
    function getCurrent();

    /**
     * Set whether or not this menu item is "current"
     *
     * Provides a fluent interface
     *
     * @param boolean $bool Specify that this menu item is current
     * @return \Knp\Menu\ItemInterface
     */
    function setIsCurrent($bool);

    /**
     * Get whether or not this menu item is "current"
     *
     * @return bool
     */
    function getIsCurrent();

    /**
     * Returns whether or not this menu is an ancestor of the current menu item
     *
     * @return boolean
     */
    function getIsCurrentAncestor();

    /**
     * @return bool Whether or not this menu item is last in its parent
     */
    function isLast();

    /**
     * @return bool Whether or not this menu item is first in its parent
     */
    function isFirst();

    /**
     * Whereas isFirst() returns if this is the first child of the parent
     * menu item, this function takes into consideration whether children are rendered or not.
     *
     * This returns true if this is the first child that would be rendered
     * for the current user
     *
     * @return boolean
     */
    function actsLikeFirst();

    /**
     * Whereas isLast() returns if this is the last child of the parent
     * menu item, this function takes into consideration whether children are rendered or not.
     *
     * This returns true if this is the last child that would be rendered
     * for the current user
     *
     * @return boolean
     */
    function actsLikeLast();

    /**
     * Returns the current uri, which is used for determining the current
     * menu item.
     *
     * If the uri isn't set, this asks the parent menu for its current uri.
     * This would recurse up the tree until the root is hit. Once the root
     * is hit, if it still doesn't know the currentUri, it gets it from the
     * request object.
     *
     * @return string
     */
    function getCurrentUri();

    /**
     * Sets the current uri, used when determining the current menu item
     *
     * This will set the current uri on the root menu item, which all other
     * menu items will use
     *
     * Provides a fluent interface
     *
     * @param string $uri
     * @return \Knp\Menu\ItemInterface
     */
    function setCurrentUri($uri);

    /**
     * Sets if the current item should render a link or not
     *
     * Provides a fluent interface
     *
     * @param bool $currentAsLink
     * @return \Knp\Menu\ItemInterface
     */
    function setCurrentAsLink($currentAsLink = true);

    /**
     * Returns the currentAsLink
     *
     * Used to determine if the current item must render
     * its text as a link or not
     *
     * @return bool
     */
    function getCurrentAsLink();


    /**
     * Calls a method recursively on all of the children of this item
     *
     * @example
     * $menu->callRecursively('setShowChildren', false);
     *
     * Provides a fluent interface
     *
     * @return \Knp\Menu\ItemInterface
     */
    function callRecursively();

    /**
     * Exports this menu item to an array
     *
     * @param boolean $withChildren Whether to include the children
     * @return array
     */
    function toArray($withChildren = true);

    /**
     * Imports a menu item array into this menu item
     *
     * Provides a fluent interface
     *
     * @param  array $array The menu item array
     * @return \Knp\Menu\ItemInterface
     */
    public function fromArray(array $array);
}
