<?php

namespace App\Services;

use App\Exports\ExcelExport;
use App\Helpers\EligibilityCreator;
use App\Helpers\FileUploader;
use App\Helpers\JsonResponse;
use App\Helpers\NotificationManager;
use App\Jobs\ImportAccountsJob;
use App\Models\Account;
use App\Models\AccountTypeSchoolDetail;
use App\Models\Area;
use App\Models\Blog;
use App\Models\ProgramManagement;
use App\Models\Branch;
use App\Models\Category;
use App\Models\City;
use App\Models\Cluster;
use App\Models\ContactAccount;
use App\Models\Eligibility;
use App\Models\Region;
use App\Models\SocialMedia;
use App\Models\Territory;
use App\Models\UpdateHistoryModule;
use App\Models\User;
use App\Services\SocialMediaService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

    class BlogService
    {
        public function getAllBlog($limit = 10, $paginate = true, $params = [], Request $request = null)
        {
            try {
                $request = $request ?? new Request();

                $order = $params['order'] ?? request('order', 'DESC');
                $search = $params['q'] ?? request('q', '');
                $ref = $params['ref'] ?? request('ref', 'id');
                $start = $params['start'] ?? request('start', null);
                $end = $params['end'] ?? request('end', null);
                $with = $params['with'] ?? request('with', []);

                $account = Blog::query()
                    ->select('blogs.*');

                if ($search) {
                    $account->where(function ($q) use ($search) {
                        $q->where('blogs.title', 'like', "%$search%")
                        ->orWhere('blogs.content', 'like', "%$search%");
                    });
                }

                if ($start && $end) {
                    $end = date('Y-m-d', strtotime($end . ' +1 day'));
                    $account->whereBetween('blogs.created_at', [$start, $end]);
                } elseif ($start) {
                    $account->where('blogs.created_at', '>=', $start);
                } elseif ($end) {
                    $account->where('blogs.created_at', '<=', $end);
                }

                if ($paginate) {
                    $account = $account->paginate($limit)->withQueryString();
                } else {
                    if ($limit && $limit != '*') {
                        $account = $account->limit($limit)->get();
                    } else {
                        $allData = collect();
                        $account->chunk(60000, function ($rows) use (&$allData) {
                            $allData = $allData->merge($rows);
                        });
                        $account = $allData;
                    }
                }

                return [
                    'code' => 200,
                    'message' => 'Get Account Successfully',
                    'data' => $account,
                ];
            } catch (Exception $e) {
                return [
                    'code' => 500,
                    'message' => $e->getMessage(),
                    'data' => [],
                ];
            }
        }


    public function getAccountById($blog_id)
    {
        try {

            $blog = new Blog();
            $blog = Blog::find($blog_id);

            if (!$blog) {
                throw new Exception('Blog not found');
            }

            $blog = $blog->toArray();
            return [
                'code' => 200,
                'message' => 'Account found',
                'data' => $blog,
            ];
        } catch (Exception $e) {
            return [
                'code' => 200,
                'message' => $e->getMessage(),
                'data' => [],
            ];
        }
    }

    public function createBlog(array $blog_data)
    {
        try {
            $blog = Blog::create($blog_data);

            return [
                'code' => 200,
                'message' => 'Blog created successfully',
                'data' => $blog,
            ];
        } catch (Exception $e) {
            return [
                'code' => 500,
                'message' => $e->getMessage(),
                'data' => [],
            ];
        }
    }

    public function updateBlog($blog_id, array $blog_data)
    {
        try {
            $blog = Blog::where('id', $blog_id);
            $blog->update($blog_data);

            

            return [
                'code' => 200,
                'message' => 'Blog updated successfully',
                'data' => $blog,
            ];
        } catch (Exception $e) {
            return [
                'code' => 500,
                'message' => $e->getMessage(),
                'data' => [],
            ];
        }
    }

    public function deleteBlog($blog_id)
    {
        try {
            $blog = Blog::find($blog_id);
            $blog->delete();

            return [
                'code' => 200,
                'message' => 'Blog deleted successfully',
                'data' => [],
            ];
        } catch (Exception $e) {
            return [
                'code' => 500,
                'message' => $e->getMessage(),
                'data' => [],
            ];
        }
    }
}
