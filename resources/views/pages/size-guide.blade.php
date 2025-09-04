@extends('layouts.app')

@section('title', 'Size Guide - NexBuy')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Header Section -->
    <div class="bg-white dark:bg-gray-800 shadow-sm reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4 reveal-child">
                    Size Guide
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-400 reveal-child">
                    Find your perfect fit with our comprehensive sizing charts and measurement guides.
                </p>
            </div>
        </div>
    </div>

    <!-- How to Measure -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 reveal-on-scroll">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 reveal-child">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 text-center">
                How to Measure
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Measurement Instructions -->
                <div class="space-y-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
                        Getting Accurate Measurements
                    </h3>
                    <div class="space-y-4 text-gray-600 dark:text-gray-400">
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <span class="text-sm font-bold text-blue-600 dark:text-blue-400">1</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">Use a Flexible Tape Measure</h4>
                                <p class="text-sm">A soft, flexible measuring tape will give you the most accurate results.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <span class="text-sm font-bold text-blue-600 dark:text-blue-400">2</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">Measure Over Light Clothing</h4>
                                <p class="text-sm">Wear form-fitting clothing or measure over underwear for best results.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <span class="text-sm font-bold text-blue-600 dark:text-blue-400">3</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">Keep Tape Snug, Not Tight</h4>
                                <p class="text-sm">The tape should be snug against your body without being constricting.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <span class="text-sm font-bold text-blue-600 dark:text-blue-400">4</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">Record Measurements</h4>
                                <p class="text-sm">Write down your measurements and refer to our size charts below.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Measurement Diagram -->
                <div class="text-center">
                    <div class="w-64 h-80 bg-gray-100 dark:bg-gray-700 rounded-xl mx-auto flex items-center justify-center reveal-child">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Measurement<br>Diagram
                            </p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 dark:text-gray-500 mt-4">
                        Visual guide showing key measurement points
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Women's Sizing -->
    <div class="bg-white dark:bg-gray-800 py-16 reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 reveal-child">
                    Women's Sizing Chart
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 reveal-child">
                    Find your perfect fit using our comprehensive women's sizing guide.
                </p>
            </div>
            
            <div class="overflow-x-auto reveal-child">
                <table class="w-full border-collapse border border-gray-200 dark:border-gray-700">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-700">
                            <th class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">Size</th>
                            <th class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">Bust (inches)</th>
                            <th class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">Waist (inches)</th>
                            <th class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">Hips (inches)</th>
                            <th class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">US Size</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-white">XS</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">30-32</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">24-26</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">34-36</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">0-2</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-white">S</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">32-34</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">26-28</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">36-38</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">4-6</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-white">M</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">34-36</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">28-30</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">38-40</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">8-10</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-white">L</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">36-38</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">30-32</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">40-42</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">12-14</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-white">XL</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">38-40</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">32-34</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">42-44</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">16-18</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Men's Sizing -->
    <div class="bg-gray-50 dark:bg-gray-900 py-16 reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 reveal-child">
                    Men's Sizing Chart
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 reveal-child">
                    Find your perfect fit using our comprehensive men's sizing guide.
                </p>
            </div>
            
            <div class="overflow-x-auto reveal-child">
                <table class="w-full border-collapse border border-gray-200 dark:border-gray-700">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-700">
                            <th class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">Size</th>
                            <th class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">Chest (inches)</th>
                            <th class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">Waist (inches)</th>
                            <th class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">Hips (inches)</th>
                            <th class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">US Size</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-white">XS</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">32-34</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">26-28</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">32-34</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">28-30</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-white">S</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">34-36</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">28-30</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">34-36</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">30-32</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-white">M</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">36-38</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">30-32</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">36-38</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">32-34</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-white">L</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">38-40</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">32-34</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">38-40</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">34-36</td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-white">XL</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">40-42</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">34-36</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">40-42</td>
                            <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">36-38</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Shoe Sizing -->
    <div class="bg-white dark:bg-gray-800 py-16 reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 reveal-child">
                    Shoe Sizing Guide
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 reveal-child">
                    Find your perfect shoe size with our comprehensive sizing charts.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Women's Shoes -->
                <div class="reveal-child">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6 text-center">
                        Women's Shoes
                    </h3>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse border border-gray-200 dark:border-gray-700">
                            <thead>
                                <tr class="bg-gray-50 dark:bg-gray-700">
                                    <th class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">US Size</th>
                                    <th class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">EU Size</th>
                                    <th class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">UK Size</th>
                                    <th class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">Foot Length (inches)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-white">5</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">35</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">3</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">8.5</td>
                                </tr>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-white">6</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">36</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">4</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">9</td>
                                </tr>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-white">7</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">37</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">5</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">9.5</td>
                                </tr>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-white">8</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">38</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">6</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">10</td>
                                </tr>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-white">9</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">39</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">7</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">10.5</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Men's Shoes -->
                <div class="reveal-child">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6 text-center">
                        Men's Shoes
                    </h3>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse border border-gray-200 dark:border-gray-700">
                            <thead>
                                <tr class="bg-gray-50 dark:bg-gray-700">
                                    <th class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">US Size</th>
                                    <th class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">EU Size</th>
                                    <th class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">UK Size</th>
                                    <th class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">Foot Length (inches)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-white">7</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">40</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">6</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">9.5</td>
                                </tr>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-white">8</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">41</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">7</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">10</td>
                                </tr>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-white">9</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">42</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">8</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">10.5</td>
                                </tr>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-white">10</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">43</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">9</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">11</td>
                                </tr>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-900 dark:text-white">11</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">44</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">10</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-3 text-gray-600 dark:text-gray-400">11.5</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sizing Tips -->
    <div class="bg-gray-50 dark:bg-gray-900 py-16 reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 reveal-child">
                    Sizing Tips & Recommendations
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 reveal-child">
                    Get the most out of our sizing charts with these helpful tips.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Tip 1 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 reveal-child">
                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3 text-center">
                        Measure Twice
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 text-center">
                        Always measure yourself at least twice to ensure accuracy. Take measurements at the same time of day for consistency.
                    </p>
                </div>

                <!-- Tip 2 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 reveal-child">
                    <div class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3 text-center">
                        Consider Fit Preference
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 text-center">
                        Some people prefer a looser fit while others like it snug. Consider your comfort preference when choosing between sizes.
                    </p>
                </div>

                <!-- Tip 3 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 reveal-child">
                    <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3 text-center">
                        Check Product Reviews
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 text-center">
                        Read customer reviews to see if items run large, small, or true to size. This can help you make the best size choice.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="bg-white dark:bg-gray-800 py-16 reveal-on-scroll">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 reveal-child">
                Still Unsure About Sizing?
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 mb-8 reveal-child">
                Our customer service team is here to help you find the perfect fit.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center reveal-child">
                <a href="{{ route('contact') }}" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-xl font-bold text-lg hover:scale-105 transition-all duration-500 shadow-xl hover:shadow-2xl">
                    Contact Support
                </a>
                <a href="{{ route('support') }}" class="border-2 border-blue-600 text-blue-600 dark:text-blue-400 px-8 py-4 rounded-xl font-bold text-lg hover:bg-blue-600 hover:text-white transition-all duration-500">
                    Visit Support Center
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
