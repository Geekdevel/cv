<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resume {{$user->name}}</title>

    {{-- <link href="/sb-admin/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> --}}
    <style>
        /*img {
            border-radius: 50%;
            height: 150px;
        }*/
        /* style pdf */
        @font-face {
        font-family: Nunito;
        src: url('fonts/Nunito_Sans/NunitoSans-Black.ttf');
        }
        body {
            font-family: "Nunito", sans-serif;
        }
        .profile {
            width: 150px;
            border-radius: 75px;
            margin: 0px 25% 0px 25%;
        }
        .fa-title {
            width: 60px;
            margin-top: 20px;
        }
        .fa-li {
            width: 18px;
        }
        /* end style pdf */
        li {
            list-style-type: none;
        }
        .wrapper {
          /*background: #42A8C0;
          max-width: 960px;
          margin: 0 auto;
          position: relative;
          -webkit-box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
          -moz-box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
          box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);*/
        }
        .sidebar-wrapper {
          background: #42A8C0;
          /*position: absolute;*/
          display: block;
          right: 0;
          width: 300px;
          float: right;
          /*width: 240px;*/
          /*height: 100%;*/
          color: #fff;
        }
        .sidebar-wrapper a {
          color: #fff;
        }
        .sidebar-wrapper .profile-container {
          padding: 10px;
          background: rgba(0, 0, 0, 0.2);
          text-align: center;
          color: #fff;
        }
        .sidebar-wrapper .name {
          font-size: 32px;
          font-weight: 900;
          margin-top: 0;
          margin-bottom: 10px;
        }
        .sidebar-wrapper .tagline {
          color: rgba(255, 255, 255, 0.6);
          font-size: 16px;
          font-weight: 400;
          margin-top: 0;
          margin-bottom: 0;
        }
        .sidebar-wrapper .profile {
          margin-bottom: 10px;
        }
        .sidebar-wrapper .contact-list .fa {
          margin-right: 5px;
          font-size: 18px;
          vertical-align: middle;
        }
        .sidebar-wrapper .contact-list li {
          margin-bottom: 5px;
        }
        .sidebar-wrapper .contact-list li:last-child {
          margin-bottom: 0;
        }
        .sidebar-wrapper .contact-list .email .fa {
          font-size: 14px;
        }
        .sidebar-wrapper .container-block {
          padding: 10px;
        }
        .sidebar-wrapper .container-block-title {
          text-transform: uppercase;
          font-size: 16px;
          font-weight: 700;
          margin-top: 0;
          margin-bottom: 5px;
        }
        .sidebar-wrapper .degree {
          font-size: 14px;
          margin-top: 0;
          margin-bottom: 5px;
        }
        .sidebar-wrapper .education-container .item {
          margin-bottom: 5px;
        }
        .sidebar-wrapper .education-container .item:last-child {
          margin-bottom: 0;
        }
        .sidebar-wrapper .education-container .meta {
          color: rgba(255, 255, 255, 0.6);
          font-weight: 500;
          margin-bottom: 0px;
          margin-top: 0;
        }
        .sidebar-wrapper .education-container .time {
          color: rgba(255, 255, 255, 0.6);
          font-weight: 500;
          margin-bottom: 0px;
        }
        .sidebar-wrapper .languages-container .lang-desc {
          color: rgba(255, 255, 255, 0.6);
        }
        .sidebar-wrapper .languages-list {
          margin-bottom: 0;
        }
        .sidebar-wrapper .languages-list li {
          margin-bottom: 5px;
        }
        .sidebar-wrapper .languages-list li:last-child {
          margin-bottom: 0;
        }
        .sidebar-wrapper .interests-list {
          margin-bottom: 0;
        }
        .sidebar-wrapper .interests-list li {
          margin-bottom: 5px;
        }
        .sidebar-wrapper .interests-list li:last-child {
          margin-bottom: 0;
        }
        .main-wrapper {
          background: #fff;
          /*padding: 60px;*/
          display: block;
          float: left;
          width: 300px;
          /*padding-right: 300px;*/
        }
        .main-wrapper .section-title {
          text-transform: uppercase;
          font-size: 20px;
          font-weight: 500;
          color: #2d7788;
          position: relative;
          margin-top: 0;
          margin-bottom: 10px;
        }
        .main-wrapper .section-title .fa {
          width: 30px;
          height: 30px;
          margin-right: 8px;
          display: inline-block;
          color: #fff;
          -webkit-border-radius: 50%;
          -moz-border-radius: 50%;
          -ms-border-radius: 50%;
          -o-border-radius: 50%;
          border-radius: 50%;
          -moz-background-clip: padding;
          -webkit-background-clip: padding-box;
          background-clip: padding-box;
          background: #2d7788;
          text-align: center;
          padding-top: 8px;
          font-size: 16px;
          position: relative;
          top: -2px;
        }
        .main-wrapper .section {
          margin-bottom: 10px;
        }
        .main-wrapper .experiences-section .item {
          margin-bottom: 10px;
        }
        .main-wrapper .upper-row {
          position: relative;
          overflow: hidden;
          margin-bottom: 2px;
        }
        .main-wrapper .job-title {
          color: #3F4650;
          font-size: 16px;
          margin-top: 0;
          margin-bottom: 0;
          font-weight: 500;
        }
        .main-wrapper .time {
          position: absolute;
          right: 0;
          top: 0;
          color: #97AAC3;
        }
        .main-wrapper .company {
          margin-bottom: 10px;
          color: #97AAC3;
        }
        .main-wrapper .project-title {
          font-size: 16px;
          font-weight: 400;
          margin-top: 0;
          margin-bottom: 5px;
        }
        .main-wrapper .projects-section .intro {
          margin-bottom: 10px;
        }
        .main-wrapper .projects-section .item {
          margin-bottom: 5px;
        }
        .skillset .item {
          margin-bottom: 5px;
          overflow: hidden;
        }
        .skillset .level-title {
          font-size: 14px;
          margin-top: 0;
          margin-bottom: 6px;
        }
        .skillset .level-bar {
          height: 12px;
          background: #f5f5f5;
        }
        .skillset .level-bar-inner {
          height: 12px;
          background: #7bc2d3;
        }
        .footer {
          padding: 10px;
          padding-top: 20px;
        }
        .footer .copyright {
          line-height: 1.6;
          color: #545E6C;
          font-size: 13px;
        }
        .footer .fa-heart {
          color: #fb866a;
        }
    </style>
</head>
<body>
    <div class="wrapper">
            <div class="sidebar-wrapper">
                <div class="profile-container">
                    <img class="profile" src="{{ url($user->profile->photo) }}" alt="{{$user->name}}"/>
                    <h1 class="name">{{ $user->name }}</h1>
                    <h3 class="tagline">{{ $resume->job_title }}</h3>
                </div><!--//profile-container-->

                <div class="contact-container container-block">
                    <ul class="list-unstyled contact-list">
                        <li class="email">
                            <img class="fa-li" src="{{ url('IconsFontAvesome/fa-envelope-bel.png') }}" alt="fa-envelope">
                            {{ $user->email }}
                        </li>
                        <li class="phone">
                            <img class="fa-li" src="{{ url('IconsFontAvesome/fa-phone-bel.png') }}" alt="fa-envelope">
                             {{ $user->phone }}
                         </li>
                        @if (isset($user->profile->web_site))
                            <li class="website">
                                <img class="fa-li" src="{{ url('IconsFontAvesome/fa-globe-bel.png') }}" alt="fa-globe">
                                 {{ $user->profile->web_site }}
                            </li>
                        @endif
                        @if (isset($user->profile->linkedin))
                            <li class="linkedin">
                                <img class="fa-li" src="{{ url('IconsFontAvesome/fa-linkedin-bel.png') }}" alt="fa-linkedin">
                                 {{ $user->profile->linkedin }}
                             </li>
                        @endif
                        @if (isset($user->profile->git))
                            <li class="github">
                                <img class="fa-li" src="{{ url('IconsFontAvesome/fa-github-bel.png') }}" alt="fa-github">
                                 {{ $user->profile->git }}
                            </li>
                        @endif
                        @if (isset($user->profile->dribbble))
                            <li class="dribbble">
                                <img class="fa-li" src="{{ url('IconsFontAvesome/fa-dribbble-bel.png') }}" alt="fa-dribbble">
                                 {{ $user->profile->dribbble }}
                            </li>
                        @endif
                        @if (isset($user->profile->behance))
                            <li class="behance">
                                <img class="fa-li" src="{{ url('IconsFontAvesome/fa-behance-bel.png') }}" alt="fa-behance">
                                 {{ $user->profile->behance }}
                            </li>
                        @endif
                    </ul>
                </div><!--//contact-container-->
                <div class="education-container container-block">
                    <h2 class="container-block-title">Education</h2>
                    @foreach($user->educations as $education)
                        <div class="item">
                            <h4 class="degree">{{ $education->level }}</h4>
                            <h5 class="meta">{{ $education->university }}</h5>
                            <div class="time">{{ $education->start }} - {{ $education->finish }}</div>
                        </div><!--//item-->
                    @endforeach
                </div><!--//education-container-->

                <div class="languages-container container-block">
                    <h2 class="container-block-title">Languages</h2>
                    <ul class="list-unstyled interests-list">
                        @foreach($user->languages as $lenguage)
                        <li>
                            {{ $lenguage->lenguage }} <span class="lang-desc">( {{ $lenguage->level->level }} )</span>
                        </li>
                        @endforeach
                    </ul>
                </div><!--//interests-->

                <div class="interests-container container-block">
                    <h2 class="container-block-title">Interests</h2>
                    <ul class="list-unstyled interests-list">
                        @foreach($user->hobbis as $hobbi)
                        <li>
                            {{ $hobbi->hobbi }}
                        </li>
                        @endforeach
                    </ul>
                </div><!--//interests-->

            </div><!--//sidebar-wrapper-->

            <div class="main-wrapper">

                <section class="section summary-section">
                    <h2 class="section-title">
                        <img class="fa-title" src="{{ url('IconsFontAvesome/fas-fa-user-krug.png') }}" alt="fas-fa-user-krug">
                        Career Profile
                    </h2>
                    <div class="summary">
                        {!! $resume->description !!}
                    </div><!--//summary-->
                </section><!--//section-->

                <section class="section experiences-section">
                    <h2 class="section-title">
                        <img class="fa-title" src="{{ url('IconsFontAvesome/fa-briefcase-krug.png') }}" alt="fa-briefcase-krug">
                        Experiences
                    </h2>

                    @foreach($user->works as $item)
                        <div class="item">
                            <div class="meta">
                                <div class="upper-row">
                                    <h3 class="job-title">{{ $item->position }}</h3>
                                    <div class="time">{{ $item->start }} - {{ $item->finish }}</div>
                                </div><!--//upper-row-->
                                <div class="company">{{ $item->experience }}</div>
                            </div><!--//meta-->
                            <div class="details">
                                {!! $item->functions !!}
                            </div><!--//details-->
                        </div><!--//item-->
                    @endforeach
                </section><!--//section-->

                <section class="section projects-section">
                    <h2 class="section-title">
                        <img class="fa-title" src="{{ url('IconsFontAvesome/fa-archive-v-krug.png') }}" alt="fa-archive-v-krug">
                        Projects
                    </h2>
                    <div class="intro">
                        {!! $user->projects->description !!}
                    </div><!--//intro-->
                </section><!--//section-->

                <section class="skills-section section">
                    <h2 class="section-title">
                        <img class="fa-title" src="{{ url('IconsFontAvesome/fa-rocket-krug.png') }}" alt="fa-rocket-krug">
                        Skills &amp; Proficiency
                    </h2>
                    <div class="skillset">
                        @foreach($user->skills as $skill)
                            <div class="item">
                                <h3 class="level-title" style="float: left; width: 30%;">{{ $skill->skill }}</h3>
                                <div class="level-bar" style="margin-left: 30%;">
                                  <div class="level-bar-inner" style="width: {{ ($skill->level_id)*25 }}%;">
                                  {{-- <div class="level-bar-inner" data-level="50%"> --}}
                                  </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section><!--//skills-section-->

            </div><!--//main-body-->
        </div>
</body>
</html>
