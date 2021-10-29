<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

abstract class ApiBaseController extends Controller
{
    use ResponseTrait;

    protected Request $request;

    /**
     * Number of items displayed at once if not specified.
     * There is no per_page if it is 1 or false.
     */
    protected int $defaultPerPage = 100;

    /**
     * Maximum per_page that can be set via $_GET['per_page'].
     */
    protected int $maximumPerPage = 200;

    /**
     * Default per_page that can be set via $_GET['per_page'].
     */
    protected int $perPage;

    /**
     * Default page that can be set via $_GET['page'].
     */
    protected int $page;

    /**
     * Allows includes relationship.
     * There is no limit if it is [], and all includes denied if it is null.
     */
    protected ?array $allowsIncludes = [];

    /**
     * Includes relationship that can be set via $_GET['include'].
     */
    protected array $include = [];

    /**
     * Get authorized user
     */
    protected ?User $user;

    /**
     * Constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->user = Auth::user();
        $this->perPage = $this->calculatePerPage();
        $this->page = $this->calculatePage();
        $this->include = $this->getIncludes();
    }

    /**
     * Calculates per_page for a number of items displayed in list.
     *
     * @return int
     */
    protected function calculatePerPage(): int
    {
        $perPage = (int)$this->request->input('per_page', $this->defaultPerPage);
        $perPage = ($this->maximumPerPage && $this->maximumPerPage < $perPage) ? $this->maximumPerPage : $perPage;

        return $perPage ?: $this->defaultPerPage;
    }

    /**
     * Calculates page number for displayed in list.
     *
     * @return int
     */
    protected function calculatePage(): int
    {
        return (int)$this->request->input('page', 1);
    }

    /**
     * Specify relations for eager loading.
     *
     * @param array $defaultIncludes
     * @return array
     */
    protected function getIncludes(array $defaultIncludes = []): array
    {
        $include = camel_case($this->request->input('include', ''));
        $includes = explode(',', $include);
        $includes = array_filter($includes);
        $includes = $includes ?: [];

        if (is_array($this->allowsIncludes) && !empty($this->allowsIncludes)) {
            $includes = array_intersect($this->allowsIncludes, $includes);
        } elseif (is_null($this->allowsIncludes)) {
            $includes = [];
        }

        return array_merge($includes, $defaultIncludes);
    }
}
