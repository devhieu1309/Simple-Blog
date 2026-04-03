@extends('layouts.public-app')

@section('main-content')
<div class="bg-white rounded-lg shadow-sm border p-8">
    <div class="prose prose-lg max-w-none">
        <div class="grid md:grid-cols-2 gap-8 mb-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Lorem, ipsum.</h2>
                <p class="text-gray-600 mb-4">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem ratione porro molestiae placeat, laborum iste! Cupiditate quia ullam quae maiores totam rerum ea vero dolore aspernatur ab accusamus illo dolorem tenetur culpa laboriosam, suscipit autem asperiores deserunt dolores delectus eligendi. Odio vitae asperiores quaerat ab beatae ipsam qui quod? Ullam?
                </p>
                <p class="text-gray-600">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga modi suscipit alias nemo hic voluptate provident iusto, officiis facilis nobis sequi reiciendis ducimus pariatur veritatis neque deserunt itaque molestias atque!
                </p>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Lorem ipsum dolor sit.</h2>
                <ul class="text-gray-600 space-y-2">
                    <li class="flex items-center">
                        <span class="w-2 h-2 bg-blue-500 rounded-full mr-3"></span>
                        Lorem ipsum dolor sit.
                    </li>
                    <li class="flex items-center">
                        <span class="w-2 h-2 bg-blue-500 rounded-full mr-3"></span>
                        Lorem ipsum dolor sit.
                    </li>
                    <li class="flex items-center">
                        <span class="w-2 h-2 bg-blue-500 rounded-full mr-3"></span>
                        Lorem ipsum dolor sit.
                    </li>
                    <li class="flex items-center">
                        <span class="w-2 h-2 bg-blue-500 rounded-full mr-3"></span>
                        Lorem ipsum dolor sit.
                    </li>
                    <li class="flex items-center">
                        <span class="w-2 h-2 bg-blue-500 rounded-full mr-3"></span>
                        Lorem ipsum dolor sit.
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t pt-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Lorem, ipsum.</h2>
            <p class="text-gray-600 mb-4">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, quas animi harum incidunt quidem temporibus fuga eius sequi. Esse, beatae! Commodi, nulla beatae! Reiciendis necessitatibus magni totam repudiandae laudantium tempora. Iure, ex repudiandae harum dolorum laboriosam quisquam rem nesciunt similique!
            </p>
            <p class="text-gray-600 mb-4">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, quae. Dolores tempora cumque ratione aperiam beatae inventore, qui vitae. Eum non est, sit voluptates soluta sint aut cumque tempora necessitatibus!
            </p>
            <p class="text-gray-600">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, natus explicabo quisquam rem non incidunt reiciendis harum aspernatur odit est, quod minus cumque esse eum beatae perferendis ut tempora nam!
            </p>
        </div>

        <div class="border-t pt-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Lorem, ipsum dolor.</h2>
            <p class="text-gray-600 mb-4">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta nulla, nihil adipisci, esse laboriosam, corporis laudantium molestias placeat at voluptas doloribus? Ratione praesentium consectetur ipsam.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="mailto:hello@simpleblog.com"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                    Email Us
                </a>
                <a href="#"
                    class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                    </svg>
                    Follow Us
                </a>
            </div>
        </div>
    </div>
</div>
@endsection