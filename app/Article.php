<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use Symfony\Component\Filesystem\Exception\IOException;

    class Article extends Model
    {
        //
        protected $table = "articles";

        public function comments()
        {
            return $this->hasMany(Comment::class);
        }

        public function getShort()
        {
            if (strlen($this->description) > 50) {
                return substr($this->description, 50);
            } else {
                return $this->description;
            }
        }

        public function views()
        {
            return $this->belongsToMany(ArticleView::class);
        }

        /**
         * Get the route key for the model.
         *
         * @return string
         */
        public function getRouteKeyName()
        {
            return 'slug';
        }

        public function addView()
        {
            $user = auth()->user();
            try {
                if ($user == null) {
                    DB::insert('insert into article_views ( article_id,user_id ) values (?,?)', [$this->id, null]);
                } else {
                    DB::insert('insert into article_views ( article_id,user_id) values (?,?)', [$this->id, $user->id]);
                }
            } catch (IOException $exception) {
                echo $exception;
                die();
            }
        }

        public function view()
        {
            return $this->hasMany(ArticleView::class);
        }

        public function like()
        {
            return $this->hasMany(Like::class);
        }

        public function newLike()
        {
            $like = new Like();
            $user = Auth::user();
            $like->save();
            $this->like()->save($like);
            return $this->like()->count();
        }

        public function sluggable()
        {
            return [
                    'slug' => [
                            'source' => 'title'
                    ]
            ];
        }

    }
