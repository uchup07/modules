<?php

namespace Uchup07\Modules\Middleware;

use Uchup07\Modules\RepositoryManager;
use Closure;

class IdentifyModule
{
    /**
     * @var Uchup07\Modules
     */
    protected $module;

    /**
     * Create a new IdentifyModule instance.
     *
     * @param Uchup07\Modules $module
     */
    public function __construct(RepositoryManager $module)
    {
        $this->module = $module;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $slug = null)
    {
        $request->session()->flash('module', $this->module->where('slug', $slug));

        return $next($request);
    }
}
