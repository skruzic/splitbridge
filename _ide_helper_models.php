<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Article
 *
 * @property int $id
 * @property string $title
 * @property string|null $summary
 * @property string $body
 * @property int $sticky
 * @property string $status
 * @property string|null $published_date
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article wherePublishedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereSticky($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUserId($value)
 */
	class Article extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Member
 *
 * @property int $id
 * @property string $surname
 * @property string $name
 * @property string|null $email
 * @property string|null $crobridge
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Rank[] $ranks
 * @property-read int|null $ranks_count
 * @method static \Illuminate\Database\Eloquent\Builder|Member newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Member newQuery()
 * @method static \Illuminate\Database\Query\Builder|Member onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Member query()
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereCrobridge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Member withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Member withoutTrashed()
 */
	class Member extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Menu
 *
 * @property int $id
 * @property int $_lft
 * @property int $_rgt
 * @property int|null $parent_id
 * @property string $title
 * @property string $uri
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Kalnoy\Nestedset\Collection|Menu[] $children
 * @property-read int|null $children_count
 * @property-read Menu|null $parent
 * @method static \Kalnoy\Nestedset\Collection|static[] all($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu ancestorsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu ancestorsOf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu applyNestedSetScope(?string $table = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu countErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu d()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu defaultOrder(string $dir = 'asc')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu descendantsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu descendantsOf($id, array $columns = [], $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu fixSubtree($root)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu fixTree($root = null)
 * @method static \Kalnoy\Nestedset\Collection|static[] get($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu getNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu getPlainNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu getTotalErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu hasChildren()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu hasParent()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu isBroken()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu leaves(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu makeGap(int $cut, int $height)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu moveNode($key, $position)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu newModelQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu newQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu orWhereAncestorOf(bool $id, bool $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu orWhereDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu orWhereNodeBetween($values)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu orWhereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu query()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu rebuildSubtree($root, array $data, $delete = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu rebuildTree(array $data, $delete = false, $root = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu reversed()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu root(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu whereAncestorOf($id, $andSelf = false, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu whereAncestorOrSelf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu whereCreatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu whereDescendantOf($id, $boolean = 'and', $not = false, $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu whereDescendantOrSelf(string $id, string $boolean = 'and', string $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu whereId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu whereIsAfter($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu whereIsBefore($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu whereIsLeaf()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu whereIsRoot()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu whereLft($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu whereNodeBetween($values, $boolean = 'and', $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu whereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu whereParentId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu whereRgt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu whereTitle($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu whereUpdatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu whereUri($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu withDepth(string $as = 'depth')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Menu withoutRoot()
 */
	class Menu extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Page
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $body
 * @property string $status
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Page findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class Page extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Rank
 *
 * @property int $id
 * @property int $tournament_id
 * @property int $member_id
 * @property int $rank
 * @property float $points
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Member|null $member
 * @property-read \App\Models\Tournament|null $tournament
 * @method static \Illuminate\Database\Eloquent\Builder|Rank list()
 * @method static \Illuminate\Database\Eloquent\Builder|Rank month($year, $month)
 * @method static \Illuminate\Database\Eloquent\Builder|Rank newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rank newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rank query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rank season()
 * @method static \Illuminate\Database\Eloquent\Builder|Rank whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rank whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rank whereMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rank wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rank whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rank whereTournamentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rank whereUpdatedAt($value)
 */
	class Rank extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Season
 *
 * @property int $id
 * @property string $title
 * @property int $current
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Season newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Season newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Season query()
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereCurrent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereUpdatedAt($value)
 */
	class Season extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tournament
 *
 * @property int $id
 * @property string $date
 * @property string $type
 * @property int $season_id
 * @property string $results
 * @property string|null $data
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Season|null $season
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament whereResults($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament whereSeasonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament whereUserId($value)
 */
	class Tournament extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

