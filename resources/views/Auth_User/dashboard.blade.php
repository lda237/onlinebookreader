@extends("layouts.auth_user")

@section("content")
<style>
/*==================
 LATEST PROPERTY SECTION
====================*/

#aa-latest-property {
    background-color: #f8f8f8;
    display: inline;
    float: left;
    width: 100%;
    padding: 100px 0;
}

#aa-latest-property .aa-latest-property-area {
    display: inline;
    float: left;
    width: 100%;
}

#aa-latest-property .aa-latest-property-area .aa-latest-properties-content {
    display: inline;
    float: left;
    margin-top: 20px;
    width: 100%;
}

.aa-properties-item {
    display: inline;
    float: left;
    margin-top: 30px;
    width: 100%;
    position: relative;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -o-transition: all 0.5s;
    transition: all 0.5s;
}

.aa-properties-item:hover {
    box-shadow: 1px 2px 5px 3px #ccc;
}

.aa-properties-item .aa-properties-item-img {
    width: 100%;
}

.aa-properties-item .aa-properties-item-img img {
    width: 100%;
}

.aa-properties-item .aa-tag {
    color: #fff;
    padding: 6px 10px;
    position: absolute;
    left: 15px;
    top: -15px;
}

.aa-properties-item .for-rent {
    background-color: #20ceb3;
}

.aa-properties-item .sold-out {
    background-color: #ff0000;
}

.aa-properties-item .aa-properties-item-content {
    background-color: #fff;
    border: 1px solid #ddd;
    border-top: none;
    display: inline;
    float: left;
    width: 100%;
}

.aa-properties-item .aa-properties-item-content .aa-properties-info {
    border-bottom: 1px solid #ddd;
    display: inline;
    float: left;
    padding: 10px;
    width: 100%;
    text-align: left;
}

.aa-properties-item .aa-properties-item-content .aa-properties-info span {
    margin: 0px 5px;
    font-size: 14px;
}

.aa-properties-item .aa-properties-item-content .aa-properties-about {
    display: inline;
    float: left;
    width: 100%;
    padding: 10px;
}

.aa-properties-item .aa-properties-item-content .aa-properties-about h3 {
    margin-top: 0px;
}

.aa-properties-item .aa-properties-item-content .aa-properties-about p {
    font-size: 14px;
}

.aa-properties-item .aa-properties-item-content .aa-properties-detial {
    border-top: 1px solid #ddd;
    display: inline;
    float: left;
    padding: 10px;
    width: 100%;
}

.aa-properties-item .aa-properties-item-content .aa-properties-detial .aa-price {
    float: left;
    font-size: 18px;
    padding: 3px 0;
}

.aa-properties-item .aa-properties-item-content .aa-properties-detial a {
    float: right;
}

.hovereffect {
    width: 100%;
    height: 100%;
    float: left;
    overflow: hidden;
    position: relative;
    text-align: center;
    cursor: default;
}

.hovereffect .overlay {
    width: 100%;
    height: 100%;
    position: absolute;
    overflow: hidden;
    top: 0;
    left: 0;
    opacity: 0;
    background-color: rgba(0, 0, 0, 0.5);
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out
}

.hovereffect img {
    display: block;
    position: relative;
    -webkit-transition: all .4s linear;
    transition: all .4s linear;
}

.hovereffect h2 {
    text-transform: uppercase;
    color: #fff;
    text-align: center;
    position: relative;
    font-size: 17px;
    background: rgba(0, 0, 0, 0.6);
    -webkit-transform: translatey(-100px);
    -ms-transform: translatey(-100px);
    transform: translatey(-100px);
    -webkit-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
    padding: 10px;
}

.hovereffect a.info {
    text-decoration: none;
    display: inline-block;
    text-transform: uppercase;
    color: #fff;
    border: 1px solid #fff;
    background-color: transparent;
    opacity: 0;
    filter: alpha(opacity=0);
    -webkit-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
    margin: 50px 0 0;
    padding: 7px 14px;
}

.hovereffect a.info:hover {
    box-shadow: 0 0 5px #fff;
}

.hovereffect:hover img {
    -ms-transform: scale(1.2);
    -webkit-transform: scale(1.2);
    transform: scale(1.2);
}

.hovereffect:hover .overlay {
    opacity: 1;
    filter: alpha(opacity=100);
}

.hovereffect:hover h2,
.hovereffect:hover a.info {
    opacity: 1;
    filter: alpha(opacity=100);
    -ms-transform: translatey(0);
    -webkit-transform: translatey(0);
    transform: translatey(0);
}

.hovereffect:hover a.info {
    -webkit-transition-delay: .2s;
    transition-delay: .2s;
}

</style>
 @if(session('status'))
            <div class="text-center alert alert-success">
                {{ session('status') }}
            </div>
             @endif
<div class="text-center">
<h3>Mes Livre</h3>
</div>
                     @if(empty($read))
                      <h4 class="text-danger text-center mt-5">Vous n'avez pas de livre sil vous plait cliquez sur acheter un livre pour acheter</h4>
                      @endif
             <section class="mb-5">
                <div class="container">
                  <div class="aa-latest-property-area">
                    <div class="text-center aa-title">
                    <div class="aa-latest-properties-content">
                      <div class="row">
                      @foreach($readers as $key=>$reader)

                        <div class="col-md-4">
                          <article class="aa-properties-item">
                          <div class="aa-properties-item-img hovereffect pb-5">
                              <img src="{{ asset('storage') }}/{{ $reader->image }}" alt="Image">
                              <div class="overlay pt-5">
                                <h4 class="text-white">{{ $reader->title }}</h4>
                        </div>
                              </div>
                              <div class="text-center card-body">
                                <a class="btn btn-info btn-lg" target="_blank" href="/assets/{{ $reader->readername }}#toolbar=0" title="">Lire</a>
                            </div>

                          </article>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
                </section>

@endsection

@section("scripts")

@endsection
