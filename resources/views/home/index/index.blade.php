@extends('layouts.home')

@section('title', $head['title'])
@section('keywords', $head['keywords'])
@section('description', $head['description'])


@section('content')
<div class="space-custom"></div>  {{-- 这个很重要，如果没有这个声明会让下边的东西拼到header的内容中 --}}

<div class="container">
    <!-- breadcrumb start -->
    <div class="breadcrumb-area">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="http://shop.blmyx.me/"><i class="fa fa-home"></i></a></li>
                <li><a href="http://blog.blmyx.me/">Blog</a></li>
                <li class="active">Data</li>
            </ol>			
        </div>
    </div>
    <!-- breadcrumb end -->
</div>

<div class="blog-area">
    <div class="container">
        <div class="row">

            <!-- 左侧检索栏-->
            <div class="col-md-3 col-sm-3 mb-40">
                <div class="column">
                    <h2 class="title-block">Catalog</h2>
                    
                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">Search</h3>
                        <form class="form-inline"  role="form" action="{{ url('search') }}" method="get">
                            <input class="b-search-text" type="text" name="wd" placeholder="Full Text Search" autocomplete="off" />
                            {{-- <button><i class="fa fa-search"></i></button> --}}
                            {{-- <input class="b-search-submit" type="submit" value="全站搜索"> --}}
                        </form>
                    </div>						

                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">Hot Tags</h3>
                        <ul class="sidebar-menu">
                            <?php $tag_i = 0; ?>
                            @foreach($tag as $v)
                                <?php $tag_i++; ?>
                                <?php $tag_i=$tag_i==5?1:$tag_i; ?>
                                <li class="b-tname">
                                    <a class="tstyle-{{ $tag_i }}" href="{{ url('tag', [$v->id]) }}">{{ $v->name }} ({{ $v->articles_count }})</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">Recommended</h3>
                        <p class="b-recommend-p">
                            @foreach($topArticle as $v)
                                <a class="b-recommend-a" href="{{ url('article', [$v->id]) }}" target="_blank"><span class="fa fa-th-list b-black"></span> {{ $v->title }}</a>
                            @endforeach
                        </p>
                    </div>

                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">Latest Comments</h3>
                        <div>
                            @foreach($newComment as $v)
                                <ul class="b-new-comment @if($loop->first) b-new-commit-first @endif">
                                    {{-- <img class="b-head-img js-head-img" src="{{ asset('uploads/avatar/default.jpg') }}" _src="{{ asset($v->avatar) }}" alt="{{ $v->name }}"> --}}
                                    <li class="b-nickname">
                                        {{ $v->name }} -- <span>{{ word_time($v->created_at) }}</span>
                                    </li>
                                    <li class="b-nc-article">
                                        在<a href="{{ url('article', [$v->article_id]) }}" target="_blank">{{ $v->title }}</a>中评论：
                                    </li>
                                    <li class="b-content">
                                        {!! $v->content !!}
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    </div>                    

                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">Interlink</h3>
                        <p>
                            @foreach($friendshipLink as $v)
                                <a class="b-link-a" href="{{ $v->url }}" target="_blank"><span class="fa fa-link b-black"></span> {{ $v->name }}</a>
                            @endforeach
                        </p>
                    </div>

                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">Styles</h3>
                        <ul class="sidebar-menu">
                            <li><a href="#"> Casual <span>(2)</span></a></li>
                            <li><a href="#"> Advanced  <span>(4)</span></a></li>
                            <li><a href="#"> Girly  <span>(4)</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 右侧博客摘要列表-->
            <div class="col-md-9 col-sm-9">
                @if(!empty($tagName))
                    <div class="row b-tag-title">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <h2>拥有<span class="b-highlight">{{ $tagName }}</span>标签的文章</h2>
                        </div>
                    </div>
                @endif
                @if(request()->has('wd'))
                    <div class="row b-tag-title">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <h2>搜索到的与<span class="b-highlight">{{ request()->input('wd') }}</span>相关的文章</h2>
                        </div>
                    </div>
                @endif
        
                <!-- 循环文章列表开始 -->
                @foreach($article as $k => $v)
                    <div class="row b-one-article">
                        <h3 class="col-xs-12 col-md-12 col-lg-12">
                            <a class="b-oa-title" href="{{ url('article', [$v->id]) }}" target="_blank">{{ $v->title }}</a>
                        </h3>
        
                        <div class="col-xs-12 col-md-12 col-lg-12 b-date">
                            <ul class="row">
                                <li class="col-xs-5 col-md-2 col-lg-3">
                                    <i class="fa fa-user"></i> {{ $v->author }}
                                </li>
                                <li class="col-xs-7 col-md-3 col-lg-3">
                                    <i class="fa fa-calendar"></i> {{ $v->created_at }}
                                </li>
                                <li class="col-xs-5 col-md-2 col-lg-2">
                                    <i class="fa fa-list-alt"></i> <a href="{{ url('category', [$v->category->id]) }}" target="_blank">{{ $v->category->name }}</a>
                                </li>
                                <li class="col-xs-7 col-md-5 col-lg-4 "><i class="fa fa-tags"></i>
                                    @foreach($v->tags as $n)
                                        <a class="b-tag-name" href="{{ url('tag', [$n->id]) }}" target="_blank">{{ $n->name }}</a>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
        
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="row">
                                <!-- 文章封面图片开始 -->
                                <div class="col-sm-6 col-md-6 col-lg-4 hidden-xs">
                                    <figure class="b-oa-pic b-style1">
                                        <a href="{{ url('article', $v->id) }}" target="_blank">
                                            <img src="{{ asset($v->cover) }}" alt="{{ $config['IMAGE_TITLE_ALT_WORD'] }}" title="{{ $config['IMAGE_TITLE_ALT_WORD'] }}">
                                        </a>
                                        <figcaption>
                                            <a href="{{ url('article', [$v->id]) }}" target="_blank"></a>
                                        </figcaption>
                                    </figure>
                                </div>
                                <!-- 文章封面图片结束 -->
        
                                <!-- 文章描述开始 -->
                                <div class="col-xs-12 col-sm-6  col-md-6 col-lg-8 b-des-read">
                                    {{ $v->description }}
                                </div>
                                <!-- 文章描述结束 -->
                            </div>
                        </div>
        
                        <a class=" b-readall" href="{{ url('article', [$v->id]) }}" target="_blank">Read More</a>
                    </div>
                @endforeach
                <!-- 循环文章列表结束 -->
        
        
                <!-- 列表分页开始 -->
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 b-page text-center">
                        {{ $article->appends(['wd' => request()->input('wd')])->links('vendor.pagination.bjypage') }}
                    </div>
                </div>
                <!-- 列表分页结束 -->
            </div>
        </div>
    </div>
</div>

@endsection