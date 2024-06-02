<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string|null $summary
 * @property string $body
 * @property int $sticky
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereSticky($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUpdatedAt($value)
 */
	class Article extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $session_id
 * @property int $number
 * @property string $dealer
 * @property string $vul
 * @property string $ns
 * @property string $nh
 * @property string $nd
 * @property string $nc
 * @property string $ss
 * @property string $sh
 * @property string $sd
 * @property string $sc
 * @property string $es
 * @property string $eh
 * @property string $ed
 * @property string $ec
 * @property string $ws
 * @property string $wh
 * @property string $wd
 * @property string $wc
 * @property string $ddn
 * @property string $dds
 * @property string $dde
 * @property string $ddw
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Session|null $session
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Traveller> $travellers
 * @property-read int|null $travellers_count
 * @method static \Illuminate\Database\Eloquent\Builder|Board newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Board newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Board query()
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereDde($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereDdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereDds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereDdw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereDealer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereEc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereEd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereEh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereEs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereNc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereNd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereNh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereNs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereSc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereSd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereSh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereSs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereVul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereWc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereWd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereWh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereWs($value)
 */
	class Board extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string $path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document query()
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereUpdatedAt($value)
 */
	class Document extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $surname
 * @property string $name
 * @property string|null $email
 * @property string|null $crobridge
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $full_name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Rank> $ranks
 * @property-read int|null $ranks_count
 * @method static \Database\Factories\MemberFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Member newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Member newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Member onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Member query()
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereCrobridge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Member withoutTrashed()
 */
	class Member extends \Eloquent {}
}

namespace App\Models{
/**
 * 
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
 */
	class Page extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $seq
 * @property mixed $amount
 * @property \Illuminate\Support\Carbon $payment_date
 * @property string $type
 * @property int|null $member_id
 * @property string|null $payer_name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Member|null $member
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePayerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaymentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereSeq($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 */
	class Payment extends \Eloquent {}
}

namespace App\Models{
/**
 * 
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
 * @method static \Database\Factories\RankFactory factory($count = null, $state = [])
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
 * 
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
 * 
 *
 * @property int $id
 * @property int $tournament_id
 * @property int $number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Board> $boards
 * @property-read int|null $boards_count
 * @method static \Illuminate\Database\Eloquent\Builder|Session newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Session newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Session query()
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereTournamentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereUpdatedAt($value)
 */
	class Session extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $date
 * @property string $type
 * @property int $season_id
 * @property string $results
 * @property int|null $remote_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Board> $boards
 * @property-read int|null $boards_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Rank> $ranks
 * @property-read int|null $ranks_count
 * @property-read \App\Models\Season|null $season
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Session> $sessions
 * @property-read int|null $sessions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Unit> $units
 * @property-read int|null $units_count
 * @method static \Database\Factories\TournamentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament whereRemoteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament whereResults($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament whereSeasonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament whereUpdatedAt($value)
 */
	class Tournament extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $board_id
 * @property int $pairNS
 * @property int $pairEW
 * @property int $round
 * @property string|null $contract
 * @property string|null $declarer
 * @property string|null $lead
 * @property string|null $tricks
 * @property int $score
 * @property bool $ruling
 * @property mixed $pointsNS
 * @property mixed $pointsEW
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Board|null $board
 * @method static \Illuminate\Database\Eloquent\Builder|Traveller byUnit(int $pairNumber)
 * @method static \Illuminate\Database\Eloquent\Builder|Traveller newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Traveller newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Traveller query()
 * @method static \Illuminate\Database\Eloquent\Builder|Traveller whereBoardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Traveller whereContract($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Traveller whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Traveller whereDeclarer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Traveller whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Traveller whereLead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Traveller wherePairEW($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Traveller wherePairNS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Traveller wherePointsEW($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Traveller wherePointsNS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Traveller whereRound($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Traveller whereRuling($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Traveller whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Traveller whereTricks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Traveller whereUpdatedAt($value)
 */
	class Traveller extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $tournament_id
 * @property int $pairNumber
 * @property string $player1
 * @property string $player2
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $names
 * @method static \Illuminate\Database\Eloquent\Builder|Unit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit wherePairNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit wherePlayer1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit wherePlayer2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereTournamentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereUpdatedAt($value)
 */
	class Unit extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
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
	class User extends \Eloquent implements \Filament\Models\Contracts\FilamentUser {}
}

