<template>
    <div v-if="id === 0" class="card__entry">
        <div class="flex justify-between card__content card_4 relative">
            <div class="absolute top-[50%] left-[20px] rotate__text text-xs uppercase text-white font-light"><div class="name"> {{ user.company }}</div></div>
            <div class="absolute top-[50%] right-[20px] rotate__text_reverse text-xs text-white font-light"><div class="name"> {{ user.website }}</div></div>

            <div class="flex justify-center gap-5 w-full main__content pt-2">
                <div class=" flex justify-center items-center qr_code">
                    <div class="qr__image" v-html="user.image"></div>
                </div>
                <div class="flex flex-col items-center photo_name pt-4">
                    <div class="flex flex-col items-center pt-3 justify-center">
                        <div v-if="user.name" class="name"> {{ user.name }}</div>
                        <div v-if="user.profession" class="profession"> {{ user.profession }}</div>
                        <div class="flex ___desc items-center pt-4">
                            <div class="flex flex-col __desc__names flex-start items-start gap-2">
                                <div v-if="user.phone" class="flex phone  "> <icon name="phone" class="w-4 h-4 mr-2 icon" /> {{ user.phone }}</div>
                                <div v-if="user.email" class="flex email  "> <icon name="email" class="w-4 h-4 mr-2 icon" /> {{ user.email }}</div>
                                <div v-if="user.location" class="flex address  "> <icon name="location" class="w-4 h-4 mr-2 icon" /> {{ user.location }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 1" class="card__entry">
        <div class="flex justify-between card__content card_6">
            <div class="flex justify-center w-full main__content relative text-white fill-white">
                <div class=" flex justify-center items-center qr_code">
                    <div class="qr__image" v-html="user.image"></div>

                </div>
                <div class="flex justify-between items-center gap-1 photo_name w-full pt-24 pb-2 pl-8 mr-3">
                    <div class="flex flex-col">
                        <div v-if="user.name" class="name"> {{ user.name }}</div>
                        <div v-if="user.profession" class="profession"> {{ user.profession }}</div>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex ___desc items-center">
                            <div class="flex flex-col __desc__names flex-start items-start gap-1">
                                <div v-if="user.phone" class="flex phone  "> <icon name="phone" class="w-4 h-4 mr-2 icon" /> {{ user.phone }}</div>
                                <div v-if="user.email" class="flex email  "> <icon name="email" class="w-4 h-4 mr-2 icon" /> {{ user.email }}</div>
                                <div v-if="user.location" class="flex address  "> <icon name="location" class="w-4 h-4 mr-2 icon" /> {{ user.location }}</div>
                                <div v-if="user.website" class="flex address  "> <icon name="website" class="w-4 h-4 mr-2 icon" /> {{ user.website }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 2" class="card__entry">
        <div class="flex flex-col justify-between card__content id_card">
            <div class="flex justify-between main__content pt-3">
                <div class="flex flex-col items-center w-3/5 photo_name">
                    <div class="flex justify-center qr_code">
                        <div class="qr__image" v-html="user.image"></div>
                    </div>
                    <div v-if="user.name" class="school_name"> {{ user.name }}</div>
                    <div v-if="user.profession" class="student_name"> {{ user.profession }}</div>
                </div>
                <div class="w-2/5 flex flex-col qr_code">
                    <div class="flex ___desc">
                        <div class="flex flex-col __desc__names flex-start items-start gap-2">
                            <div v-if="user.phone" class="flex phone  "> <icon name="phone" class="w-4 h-4 mr-2 icon" /> {{ user.phone }}</div>
                            <div v-if="user.email" class="flex email  "> <icon name="email" class="w-4 h-4 mr-2 icon" /> {{ user.email }}</div>
                            <div v-if="user.location" class="flex address  "> <icon name="location" class="w-4 h-4 mr-2 icon" /> {{ user.location }}</div>
                            <div v-if="user.website" class="flex address  "> <icon name="website" class="w-4 h-4 mr-2 icon" /> {{ user.website }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full flex justify-between items-center gap-[8%] bottom__content">
                <div class="flex w-full bar"></div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 3" class="card__entry">
        <div class="flex justify-between card__content card_1">
            <div class="flex justify-between w-full main__content">
                <div class="flex items-center justify-center round_circle">
                    <div class="c__border border-[12px] border-[#4d4d4d] w-24 w-24">
                        <div class=" flex justify-center items-center qr_code ">
                            <div class="qr__image" v-html="user.image"></div>

                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-center photo_name pt-4">

                    <div class="flex flex-col items-center pt-3 justify-center">
                        <div v-if="user.name" class="name"> {{ user.name }}</div>
                        <div v-if="user.profession" class="profession"> {{ user.profession }}</div>
                        <div class="flex ___desc items-center pt-4">
                            <div class="flex flex-col __desc__names flex-start items-start gap-2">
                                <div v-if="user.phone" class="flex phone  "> <icon name="phone" class="w-4 h-4 mr-2 icon" /> {{ user.phone }}</div>
                                <div v-if="user.email" class="flex email  "> <icon name="email" class="w-4 h-4 mr-2 icon" /> {{ user.email }}</div>
                                <div v-if="user.location" class="flex address  "> <icon name="location" class="w-4 h-4 mr-2 icon" /> {{ user.location }}</div>
                                <div v-if="user.website" class="flex address  "> <icon name="website" class="w-4 h-4 mr-2 icon" /> {{ user.website }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 4" class="card__entry">
        <div class="flex justify-between card__content card_landscape_5">
            <div class="flex flex-col w-full main__content">
                <div class="flex flex-col justify-center items-center pt-5">
                    <div v-if="user.name" class="name"> {{ user.name }}</div>
                    <div v-if="user.profession" class="profession"> {{ user.profession }}</div>
                </div>
                <div class=" flex justify-center items-center qr_code pt-5 ">
                    <div class="qr__image" v-html="user.image"></div>

                </div>
                <div class="flex flex-col items-center photo_name pt-6 w-full">
                    <div class="flex flex-col items-center justify-center w-full">
                        <div class="flex ___desc items-center pt-1 w-full">
                            <div class="flex flex-col __desc__names justify-center items-center gap-2 w-full">
                                <div class="flex justify-center w-full">
                                    <div v-if="user.phone" class="flex phone items-end justify-end w-1/2"> {{ user.phone }} <icon name="phone" class="w-4 h-4 ml-1 mr-1 icon" /></div>
                                    <div v-if="user.email" class="flex email items-start justify-start w-1/2"> <icon name="email" class="w-4 h-4 mr-1 ml-1 icon" /> {{ user.email }}</div>
                                </div>
                                <div class="flex justify-center w-full">
                                    <div v-if="user.location" class="flex address items-end justify-end w-1/2">  {{ user.location }} <icon name="location" class="w-4 h-4 ml-1 mr-1 icon" /></div>
                                    <div v-if="user.website" class="flex address items-start justify-start w-1/2"> <icon name="website" class="w-4 h-4 mr-1 ml-1 icon" /> {{ user.website }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 5" class="card__entry">
        <div class="flex justify-between card__content card_landscape_6">
            <div class="flex flex-col w-full main__content">
                <div class="flex w-full justify-between p-5">
                    <div class="flex flex-col justify-start items-start pt-7">
                        <div v-if="user.name" class="name"> {{ user.name }}</div>
                        <div v-if="user.profession" class="profession"> {{ user.profession }}</div>
                    </div>
                    <div class=" flex justify-center items-center qr_code pt-5 ">
                        <div class="qr__image" v-html="user.image"></div>

                    </div>
                </div>
                <div class="flex flex-col items-start photo_name pt-6 pl-5">
                    <div class="flex flex-col items-start justify-start">
                        <div class="flex ___desc items-start pt-3">
                            <div class="flex flex-col __desc__names justify-center items-center gap-2">
                                <div class="flex justify-center w-full">
                                    <div v-if="user.phone" class="flex phone items-end justify-end w-1/2"> {{ user.phone }} <icon name="phone" class="w-4 h-4 ml-1 mr-1 icon" /></div>
                                    <div v-if="user.email" class="flex email items-start justify-start w-1/2"> <icon name="email" class="w-4 h-4 mr-1 ml-1 icon" /> {{ user.email }}</div>
                                </div>
                                <div class="flex justify-center w-full">
                                    <div v-if="user.location" class="flex address items-end justify-end w-1/2">  {{ user.location }} <icon name="location" class="w-4 h-4 ml-1 mr-1 icon" /></div>
                                    <div v-if="user.website" class="flex address items-start justify-start w-1/2"> <icon name="website" class="w-4 h-4 mr-1 ml-1 icon" /> {{ user.website }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 6" class="card__entry">
        <div class="flex justify-between card__content card_landscape_7">
            <div class="flex flex-col w-full main__content">
                <div class="flex w-full justify-between p-6 pl-8">
                    <div class="flex flex-col justify-start items-start pt-7">
                        <div v-if="user.name" class="name"> {{ user.name }}</div>
                        <div v-if="user.profession" class="profession"> {{ user.profession }}</div>
                    </div>
                    <div class=" flex justify-center items-center qr_code pt-0 ">
                        <div class="qr__image" v-html="user.image"></div>

                    </div>
                </div>
                <div class="flex flex-col items-start photo_name pt-1 pl-8">
                    <div class="flex flex-col items-start justify-start">
                        <div class="flex ___desc items-start">
                            <div class="flex flex-col __desc__names justify-start items-start gap-2">
                                <div class="flex flex-col justify-center w-full">
                                    <div v-if="user.phone" class="flex phone"> <icon name="phone" class="w-4 h-4 mr-1 icon" /> {{ user.phone }} </div>
                                    <div v-if="user.email" class="flex email"> <icon name="email" class="w-4 h-4 mr-1 icon" /> {{ user.email }}</div>
                                    <div v-if="user.email" class="flex address"> <icon name="location" class="w-4 h-4 mr-1 icon" /> {{ user.location }}</div>
                                    <div v-if="user.email" class="flex address"> <icon name="website" class="w-4 h-4 mr-1 icon" /> {{ user.website }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 7" class="card__entry">
        <div class="flex justify-between card__content card_landscape_8">
            <div class="flex flex-col w-full main__content">
                <div class="flex flex-col justify-center items-center pt-5">
                    <div v-if="user.name" class="name"> {{ user.name }}</div>
                    <div v-if="user.profession" class="profession"> {{ user.profession }}</div>
                </div>
                <div class=" flex justify-center items-center qr_code pt-5 ">
                    <div class="qr__image" v-html="user.image"></div>

                </div>
                <div class="flex flex-col items-center photo_name pt-6">
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex ___desc items-center pt-3">
                            <div class="flex flex-col __desc__names justify-center items-center gap-2">
                                <div class="flex justify-center w-full">
                                    <div v-if="user.phone" class="flex phone items-end justify-end w-1/2"> {{ user.phone }} <icon name="phone" class="w-4 h-4 ml-1 mr-1 icon" /></div>
                                    <div v-if="user.email" class="flex email items-start justify-start w-1/2"> <icon name="email" class="w-4 h-4 mr-1 ml-1 icon" /> {{ user.email }}</div>
                                </div>
                                <div class="flex justify-center w-full">
                                    <div v-if="user.location" class="flex address items-end justify-end w-1/2">  {{ user.location }} <icon name="location" class="w-4 h-4 ml-1 mr-1 icon" /></div>
                                    <div v-if="user.website" class="flex address items-start justify-start w-1/2"> <icon name="website" class="w-4 h-4 mr-1 ml-1 icon" /> {{ user.website }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 8" class="card__entry">
        <div class="flex justify-between card__content card_landscape_9">
            <div class="flex justify-center w-full main__content relative text-white fill-white">
                <div class=" flex justify-center items-center qr_code">
                    <div class="qr__image" v-html="user.image"></div>

                </div>
                <div class="flex justify-between items-center gap-1 photo_name w-full pt-24 pb-2 pl-8 mr-3">
                    <div class="flex flex-col">
                        <div v-if="user.name" class="name"> {{ user.name }}</div>
                        <div v-if="user.profession" class="profession"> {{ user.profession }}</div>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex ___desc items-center">
                            <div class="flex flex-col __desc__names flex-start items-start gap-1">
                                <div v-if="user.phone" class="flex phone  "> <icon name="phone" class="w-4 h-4 mr-2 icon" /> {{ user.phone }}</div>
                                <div v-if="user.email" class="flex email  "> <icon name="email" class="w-4 h-4 mr-2 icon" /> {{ user.email }}</div>
                                <div v-if="user.location" class="flex address  "> <icon name="location" class="w-4 h-4 mr-2 icon" /> {{ user.location }}</div>
                                <div v-if="user.website" class="flex address  "> <icon name="website" class="w-4 h-4 mr-2 icon" /> {{ user.website }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 9" class="card__entry">
        <div class="flex justify-between card__content card_landscape_10">
            <div class="flex flex-col w-full main__content">
                <div class="flex flex-col justify-start items-start pt-8 pl-[40px]">
                    <div v-if="user.name" class="name"> {{ user.name }}</div>
                    <div v-if="user.profession" class="profession"> {{ user.profession }}</div>
                </div>
                <div class="flex flex-col items-start photo_name pt-6 pl-[40px]">
                    <div class="flex flex-col items-start justify-start">
                        <div class="flex ___desc items-start">
                            <div class="flex flex-col __desc__names justify-start items-start gap-2">
                                <div class="flex flex-col justify-center w-full">
                                    <div v-if="user.phone" class="flex phone"> <icon name="phone" class="w-4 h-4 mr-1 icon" /> {{ user.phone }} </div>
                                    <div v-if="user.email" class="flex email"> <icon name="email" class="w-4 h-4 mr-1 icon" /> {{ user.email }}</div>
                                    <div v-if="user.email" class="flex address"> <icon name="location" class="w-4 h-4 mr-1 icon" /> {{ user.location }}</div>
                                    <div v-if="user.email" class="flex address"> <icon name="website" class="w-4 h-4 mr-1 icon" /> {{ user.website }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute top-8 right-8 bg-white p-1">
                    <div class=" flex justify-center items-center qr_code pt-0 ">
                        <div class="qr__image" v-html="user.image"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 10" class="card__entry">
        <div class="flex justify-between card__content card_landscape_11">
            <div class="flex flex-col w-full main__content">
                <div class="flex flex-col justify-center items-center pt-8">
                    <div v-if="user.name" class="name"> {{ user.name }}</div>
                    <div v-if="user.profession" class="profession"> {{ user.profession }}</div>
                </div>
                <div class=" flex justify-center items-center qr_code pt-3 ">
                    <div class="qr__image" v-html="user.image"></div>

                </div>
                <div class="flex flex-col items-center photo_name pt-1 w-full">
                    <div class="flex flex-col items-center justify-center w-full">
                        <div class="flex ___desc items-center pt-1 w-full">
                            <div class="flex flex-col __desc__names justify-center items-center gap-2 w-full">
                                <div class="flex justify-center w-full">
                                    <div v-if="user.phone" class="flex phone items-end justify-end w-1/2"> {{ user.phone }} <icon name="phone" class="w-4 h-4 ml-1 mr-1 icon" /></div>
                                    <div v-if="user.email" class="flex email items-start justify-start w-1/2"> <icon name="email" class="w-4 h-4 mr-1 ml-1 icon" /> {{ user.email }}</div>
                                </div>
                                <div class="flex justify-center w-full">
                                    <div v-if="user.location" class="flex address items-end justify-end w-1/2">  {{ user.location }} <icon name="location" class="w-4 h-4 ml-1 mr-1 icon" /></div>
                                    <div v-if="user.website" class="flex address items-start justify-start w-1/2"> <icon name="website" class="w-4 h-4 mr-1 ml-1 icon" /> {{ user.website }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 11" class="card__entry">
        <div class="flex justify-between card__content card_landscape_12">
            <div class="flex justify-center w-full main__content relative text-white fill-white">
                <div class=" flex justify-center items-center qr_code">
                    <div class="qr__image" v-html="user.image"></div>

                </div>
                <div class="flex justify-between items-center gap-1 photo_name w-full pt-24 pb-2 pl-8 mr-3">
                    <div class="flex flex-col">
                        <div v-if="user.name" class="name"> {{ user.name }}</div>
                        <div v-if="user.profession" class="profession"> {{ user.profession }}</div>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex ___desc items-center">
                            <div class="flex flex-col __desc__names flex-start items-start gap-1">
                                <div v-if="user.phone" class="flex phone  "> <icon name="phone" class="w-4 h-4 mr-2 icon" /> {{ user.phone }}</div>
                                <div v-if="user.email" class="flex email  "> <icon name="email" class="w-4 h-4 mr-2 icon" /> {{ user.email }}</div>
                                <div v-if="user.location" class="flex address  "> <icon name="location" class="w-4 h-4 mr-2 icon" /> {{ user.location }}</div>
                                <div v-if="user.website" class="flex address  "> <icon name="website" class="w-4 h-4 mr-2 icon" /> {{ user.website }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 12" class="card__entry">
        <div class="flex justify-between card__content card_landscape_13">
            <div class="flex justify-center w-full main__content relative text-white fill-white">
                <div class=" absolute right-3 top-3 items-center qr_code">
                    <div class="qr__image" v-html="user.image"></div>
                </div>
                <div class="flex justify-between items-center gap-1 photo_name w-full pt-2 pb-2 pl-24">
                    <div class="flex ___desc items-center">
                        <div class="flex flex-col __desc__names flex-start items-start">
                            <div v-if="user.name" class="flex name"> {{ user.name }}</div>
                            <div v-if="user.profession" class="flex profession"> {{ user.profession }}</div>
                            <div v-if="user.phone" class="flex phone  ">  {{ user.phone }}</div>
                            <div v-if="user.email" class="flex email  ">  {{ user.email }}</div>
                            <div v-if="user.website" class="flex address  "> {{ user.website }}</div>
                            <div v-if="user.location" class="flex address  "> {{ user.location }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 13" class="card__entry">
        <div class="flex justify-between card__content card_landscape_14">
            <div class="flex justify-center w-full main__content relative text-white fill-white">
                <div class=" absolute right-2 top-3 items-center qr_code">
                    <div class="qr__image" v-html="user.image"></div>
                </div>
                <div class="flex justify-between items-center gap-1 photo_name w-full pt-2 pb-2 pl-6">
                    <div class="flex ___desc items-center">
                        <div class="flex flex-col __desc__names flex-start items-start">
                            <div v-if="user.name" class="flex name"> {{ user.name }}</div>
                            <div v-if="user.profession" class="flex profession"> {{ user.profession }}</div>
                            <div v-if="user.phone" class="flex phone  ">  {{ user.phone }}</div>
                            <div v-if="user.email" class="flex email  ">  {{ user.email }}</div>
                            <div v-if="user.website" class="flex address  "> {{ user.website }}</div>
                            <div v-if="user.location" class="flex address  "> {{ user.location }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 14" class="card__entry">
        <div class="flex justify-between card__content card_landscape_15">
            <div class="flex flex-col w-full main__content">
                <div class="flex flex-col justify-start items-start pt-8 pl-[40px]">
                    <div v-if="user.name" class="name"> {{ user.name }}</div>
                    <div v-if="user.profession" class="profession"> {{ user.profession }}</div>
                </div>
                <div class="flex flex-col items-start photo_name pt-6 pl-[40px]">
                    <div class="flex flex-col items-start justify-start">
                        <div class="flex ___desc items-start">
                            <div class="flex flex-col __desc__names justify-start items-start gap-2">
                                <div class="flex flex-col justify-center w-full">
                                    <div v-if="user.phone" class="flex phone"> <icon name="phone" class="w-4 h-4 mr-1 icon" /> {{ user.phone }} </div>
                                    <div v-if="user.email" class="flex email"> <icon name="email" class="w-4 h-4 mr-1 icon" /> {{ user.email }}</div>
                                    <div v-if="user.email" class="flex address"> <icon name="location" class="w-4 h-4 mr-1 icon" /> {{ user.location }}</div>
                                    <div v-if="user.email" class="flex address"> <icon name="website" class="w-4 h-4 mr-1 icon" /> {{ user.website }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute top-8 right-8 bg-white p-1">
                    <div class=" flex justify-center items-center qr_code pt-0 ">
                        <div class="qr__image" v-html="user.image"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 15" class="card__entry">
        <div class="flex justify-between card__content card_landscape_16">
            <div class="flex flex-col w-full main__content">
                <div class="flex flex-col justify-start items-start pt-8 pl-[40px]">
                    <div v-if="user.name" class="name"> {{ user.name }}</div>
                    <div v-if="user.profession" class="profession"> {{ user.profession }}</div>
                </div>
                <div class="flex flex-col items-start photo_name pt-6 pl-[40px]">
                    <div class="flex flex-col items-start justify-start">
                        <div class="flex ___desc items-start">
                            <div class="flex flex-col __desc__names justify-start items-start gap-2">
                                <div class="flex flex-col justify-center w-full">
                                    <div v-if="user.phone" class="flex phone"> <icon name="phone" class="w-4 h-4 mr-1 icon" /> {{ user.phone }} </div>
                                    <div v-if="user.email" class="flex email"> <icon name="email" class="w-4 h-4 mr-1 icon" /> {{ user.email }}</div>
                                    <div v-if="user.email" class="flex address"> <icon name="location" class="w-4 h-4 mr-1 icon" /> {{ user.location }}</div>
                                    <div v-if="user.email" class="flex address"> <icon name="website" class="w-4 h-4 mr-1 icon" /> {{ user.website }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute top-8 right-8 bg-white p-1">
                    <div class=" flex justify-center items-center qr_code pt-0 ">
                        <div class="qr__image" v-html="user.image"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else class="card__entry" :class="'cid_'+id">
        <div class="flex justify-between card__content card_landscape" :style="ds">
            <div class="flex flex-col w-full main__content">
                <div class="flex flex-col justify-start items-start pt-8 pl-[40px]">
                    <div v-if="user.name" class="name"> {{ user.name }}</div>
                    <div v-if="user.profession" class="profession"> {{ user.profession }}</div>
                </div>
                <div class="flex flex-col items-start photo_name pt-6 pl-[40px]">
                    <div class="flex flex-col items-start justify-start">
                        <div class="flex ___desc items-start">
                            <div class="flex flex-col __desc__names justify-start items-start gap-2">
                                <div class="flex flex-col justify-center w-full">
                                    <div v-if="user.phone" class="flex phone"> <icon name="phone" class="w-4 h-4 mr-1 icon" /> {{ user.phone }} </div>
                                    <div v-if="user.email" class="flex email"> <icon name="email" class="w-4 h-4 mr-1 icon" /> {{ user.email }}</div>
                                    <div v-if="user.location" class="flex address"> <icon name="location" class="w-4 h-4 mr-1 icon" /> {{ user.location }}</div>
                                    <div v-if="user.website" class="flex address"> <icon name="website" class="w-4 h-4 mr-1 icon" /> {{ user.website }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute top-8 right-8 bg-white p-1">
                    <div class=" flex justify-center items-center qr_code ">
                        <div class="qr__image" v-html="user.image"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Icon from '@/Shared/Icon';
export default {
    components: { Icon, },
  props: {
      id: Number, user: Object, ds: {required: false},
  },
    data(){
        return{
            cacheKey: +new Date(),
        }
    }
}
</script>
