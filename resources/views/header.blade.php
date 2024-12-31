<div class="headerContainer">
    <div class="head">
        <div class="name">
            <a href="{{ url('/') }}">WebJa</a>
        </div>
        <div class="data_1"></div>
        <div class="data_2"></div>
        <div class="data_3"></div>
        <div class="data_4"></div>
        <div class="data_5"></div>
        <div class="data_6"></div>
        <div class="data_7"></div>
        <div class="LogIn">
            <a href="{{'/login'}}" target="_blank">LogIn</a>
        </div>
        <div class="enroll">
            <button>
                <a href="{{'/dashboard'}}" target="_blank">Enroll</a>
            </button>
        </div>
        <div class="LiveIt">
            <button>
                <a href="{{'/editor'}}" target="_blank">LiveIt</a>
            </button>
        </div>
    </div>
    <div class="topics">

        <div class="topicsContainer">
            @if ($topics->isNotEmpty())
            @foreach ($topics as $topic)
                <div class="topicsBox">
                    <a href="courses/{{$topic->id}}" target="_blank">{{$topic->name}}</a>
                </div>
            @endforeach
        @else
            <p>No topics found.</p>
        @endif
        </div>

    </div>
</div>
