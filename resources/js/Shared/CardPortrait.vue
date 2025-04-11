<template>
    <div v-if="id === 0" class="card__entry">
        <div class="flex justify-between card__content card_2">
            <div class="flex flex-col w-full main__content">
                <div class="flex flex-col items-center photo_name pt-12">
                    <div class=" flex justify-center items-center qr_code">
                        <div class="qr__image" v-html="user.image"></div>
                    </div>
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
    <div v-else-if="id === 1" class="card__entry">
        <div class="flex justify-between card__content card_3">
            <div class="flex flex-col w-full main__content text-white relative">
                <div class="flex items-center justify-center round_circle pt-4 pl-4 pt-9">
                    <div class="text-lg uppercase font-light __company"> {{ user.company }}</div>
                </div>
                <div class="flex flex-col flex-start photo_name p-4 pt-8">
                    <div v-if="user.name" class="text-xl font-bold"> {{ user.name }}</div>
                    <div v-if="user.profession" class="tracking-[3px] text-xs uppercase font-light"> {{ user.profession }}</div>
                </div>
                <div class="flex justify-center items-center w-full pt-12">
                    <div v-if="user.phone" class="flex phone tracking-[3px] text-xs font-light pt-2 h-5 w-full justify-center items-center"> <icon name="phone" class="w-3 h-3 mr-2 icon fill-white" /> {{ user.phone }}</div>
                </div>
                <div class="flex justify-center items-center gap-3 bottom__sec w-full absolute bottom-1 pb-2">
                    <div class=" flex justify-center items-center qr_code">
                        <div class="qr__image" v-html="user.image"></div>

                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex ___desc items-center">
                            <div class="flex flex-col __desc__names flex-start items-start gap-1">
                                <div v-if="user.location" class="flex address  "> <icon name="location" class="w-4 h-4 mr-2 icon" /> {{ user.location }}</div>
                                <div v-if="user.email" class="flex email  "> <icon name="email" class="w-4 h-4 mr-2 icon" /> {{ user.email }}</div>
                                <div v-if="user.website" class="flex address  "> <icon name="website" class="w-4 h-4 mr-2 icon" /> {{ user.website }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 2" class="card__entry">
        <div class="flex justify-between card__content card_5">
            <div class="flex flex-col w-full main__content text-[#3c3431] relative">
                <div class="flex items-center justify-center round_circle pt-7 w-full">
                    <div  class="text-lg uppercase font-light __company"> {{ user.company }}</div>
                </div>
                <div class="flex flex-col justify-center items-center photo_name pt-5 w-full">
                    <div v-if="user.name" class="text-xl font-bold text-[#c66b3b]"> {{ user.name }}</div>
                    <div v-if="user.profession" class="tracking-[3px] text-xs uppercase font-light"> {{ user.profession }}</div>
                </div>
                <div class="flex justify-center items-center w-full pt-2">
                    <div v-if="user.phone" class="flex phone text-xs font-light pt-2 h-5 w-full justify-center items-center"> <icon name="phone" class="w-3 h-3 mr-1 icon" /> {{ user.phone }}</div>
                </div>
                <div class="flex flex-col justify-center items-center gap-3 bottom__sec w-full absolute bottom-3 pb-2">
                    <div class=" flex justify-center items-center qr_code">
                        <div class="qr__image" v-html="user.image"></div>

                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex ___desc items-center">
                            <div class="flex flex-col __desc__names flex-start items-start gap-1">
                                <div v-if="user.location" class="flex address  "> <icon name="location" class="w-4 h-4 mr-2 icon" /> {{ user.location }}</div>
                                <div v-if="user.email" class="flex email  "> <icon name="email" class="w-4 h-4 mr-2 icon" /> {{ user.email }}</div>
                                <div v-if="user.website" class="flex address  "> <icon name="website" class="w-4 h-4 mr-2 icon" /> {{ user.website }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 3" class="card__entry">
        <div class="flex justify-between card__content card_portrait_4">
            <div class="flex flex-col w-full main__content text-[#3c3431] relative">
                <div class="flex items-center justify-center round_circle pt-7 w-full">
                    <div  class="text-lg uppercase font-light __company"> {{ user.company }}</div>
                </div>
                <div class="flex flex-col justify-center items-center photo_name pt-5 w-full">
                    <div v-if="user.name" class="text-xl font-bold text-[#c66b3b]"> {{ user.name }}</div>
                    <div v-if="user.profession" class="tracking-[3px] text-xs uppercase font-light"> {{ user.profession }}</div>
                </div>
                <div class="flex justify-center items-center w-full pt-2">
                    <div v-if="user.phone" class="flex phone text-xs font-light pt-2 h-5 w-full justify-center items-center"> <icon name="phone" class="w-3 h-3 mr-1 icon" /> {{ user.phone }}</div>
                </div>
                <div class="flex flex-col justify-center items-center gap-3 bottom__sec w-full pt-4">
                    <div class=" flex justify-center items-center qr_code">
                        <div class="qr__image" v-html="user.image"></div>

                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex ___desc items-center">
                            <div class="flex flex-col __desc__names flex-start items-start gap-1">
                                <div v-if="user.location" class="flex address  "> <icon name="location" class="w-4 h-4 mr-2 icon" /> {{ user.location }}</div>
                                <div v-if="user.email" class="flex email  "> <icon name="email" class="w-4 h-4 mr-2 icon" /> {{ user.email }}</div>
                                <div v-if="user.website" class="flex address  "> <icon name="website" class="w-4 h-4 mr-2 icon" /> {{ user.website }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 4" class="card__entry">
        <div class="flex justify-between card__content card_portrait_5">
            <div class="flex flex-col w-full main__content text-[#3c3431] relative">
                <div class="flex flex-col gap-5 items-center justify-center round_circle pt-5 w-full">
                    <div  class="text-lg uppercase font-light __company"> {{ user.company }}</div>
                    <div class=" flex justify-center items-center qr_code">
                        <div class="qr__image" v-html="user.image"></div>

                    </div>
                </div>
                <div class="flex flex-col justify-start items-start pl-[22px] photo_name pt-12 w-full">
                    <div v-if="user.name" class="text-xl font-bold text-[#31bdef]"> {{ user.name }}</div>
                    <div v-if="user.profession" class="tracking-[3px] text-xs uppercase font-light"> {{ user.profession }}</div>
                </div>
                <div class="flex justify-center items-center w-full pt-2">
                    <div v-if="user.phone" class="flex phone text-xs font-light pt-2 h-5 w-full justify-start items-start ml-[32px]"> <icon name="phone" class="w-3 h-3 mr-[6px] icon" /> {{ user.phone }}</div>
                </div>
                <div class="flex flex-col justify-start items-start gap-3 bottom__sec w-full pt-4 pl-[28px]">
                    <div class="flex flex-col items-start justify-start">
                        <div class="flex ___desc items-center">
                            <div class="flex flex-col __desc__names flex-start items-start gap-1">
                                <div v-if="user.location" class="flex address  "> <icon name="location" class="w-4 h-4 mr-2 icon" /> {{ user.location }}</div>
                                <div v-if="user.email" class="flex email  "> <icon name="email" class="w-4 h-4 mr-2 icon" /> {{ user.email }}</div>
                                <div v-if="user.website" class="flex address  "> <icon name="website" class="w-4 h-4 mr-2 icon" /> {{ user.website }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 5" class="card__entry">
        <div class="flex justify-between card__content card_portrait_6">
            <div class="flex flex-col w-full main__content text-[#3c3431] relative">
                <div class="flex items-center justify-center round_circle pt-7 w-full">
                    <div  class="text-lg uppercase font-light __company"> {{ user.company }}</div>
                </div>
                <div class="flex flex-col justify-center items-center photo_name pt-5 w-full">
                    <div v-if="user.name" class="text-xl font-bold text-[#1a3761]"> {{ user.name }}</div>
                    <div v-if="user.profession" class="tracking-[3px] text-xs uppercase font-light"> {{ user.profession }}</div>
                </div>
                <div class="flex justify-center items-center w-full pt-2">
                    <div v-if="user.phone" class="flex phone text-xs font-light pt-2 h-5 w-full justify-center items-center"> <icon name="phone" class="w-3 h-3 mr-1 icon" /> {{ user.phone }}</div>
                </div>
                <div class="flex flex-col justify-center items-center gap-3 bottom__sec w-full pt-4">
                    <div class=" flex justify-center items-center qr_code">
                        <div class="qr__image" v-html="user.image"></div>

                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex ___desc items-center">
                            <div class="flex flex-col __desc__names flex-start items-start gap-1">
                                <div v-if="user.location" class="flex address  "> <icon name="location" class="w-4 h-4 mr-2 icon" /> {{ user.location }}</div>
                                <div v-if="user.email" class="flex email  "> <icon name="email" class="w-4 h-4 mr-2 icon" /> {{ user.email }}</div>
                                <div v-if="user.website" class="flex address  "> <icon name="website" class="w-4 h-4 mr-2 icon" /> {{ user.website }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 6" class="card__entry">
        <div class="flex justify-between card__content card_portrait_7">
            <div class="flex flex-col w-full main__content text-[#3c3431] relative">
                <div class="flex flex-col gap-5 items-center justify-center text-center pl-[44%] round_circle pt-5 w-full">
                    <div  class="text-lg uppercase font-light text-center __company"> {{ user.company }}</div>
                    <div class=" flex justify-center items-center qr_code">
                        <div class="qr__image" v-html="user.image"></div>

                    </div>
                </div>
                <div class="flex flex-col justify-start items-start pl-[22px] photo_name pt-12 w-full">
                    <div v-if="user.name" class="text-xl font-bold text-[#6190af]"> {{ user.name }}</div>
                    <div v-if="user.profession" class="tracking-[3px] text-xs uppercase font-light"> {{ user.profession }}</div>
                </div>
                <div class="flex flex-col justify-start items-start gap-3 bottom__sec w-full pt-5 pl-[22px]">
                    <div class="flex flex-col items-start justify-start">
                        <div class="flex ___desc items-center">
                            <div class="flex flex-col __desc__names flex-start items-start gap-2">
                                <div v-if="user.phone" class="flex phone "> <icon name="phone" class="w-4 h-4 mr-2 icon" /> {{ user.phone }}</div>
                                <div v-if="user.location" class="flex address  "> <icon name="location" class="w-4 h-4 mr-2 icon" /> {{ user.location }}</div>
                                <div v-if="user.email" class="flex email  "> <icon name="email" class="w-4 h-4 mr-2 icon" /> {{ user.email }}</div>
                                <div v-if="user.website" class="flex address  "> <icon name="website" class="w-4 h-4 mr-2 icon" /> {{ user.website }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 7" class="card__entry">
        <div class="flex justify-between card__content card_portrait_8">
            <div class="flex flex-col w-full main__content text-[#3c3431] relative">
                <div class="flex flex-col gap-3 items-center justify-center text-center round_circle pt-12 w-full">
                    <div  class="text-lg uppercase font-light text-center __company"> {{ user.company }}</div>
                    <div class=" flex justify-center items-center qr_code">
                        <div class="qr__image" v-html="user.image"></div>

                    </div>
                </div>
                <div class="flex flex-col justify-center items-center photo_name pt-3 w-full">
                    <div v-if="user.name" class="text-xl font-bold text-[#1fc3f0]"> {{ user.name }}</div>
                    <div v-if="user.profession" class="tracking-[3px] text-xs uppercase font-light"> {{ user.profession }}</div>
                </div>
                <div class="flex justify-center items-center w-full pt-2">
                    <div v-if="user.phone" class="flex phone text-xs font-light pt-2 h-5 w-full justify-center items-center"> <icon name="phone" class="w-3 h-3 mr-1 icon" /> {{ user.phone }}</div>
                </div>
                <div class="flex flex-col justify-center items-center gap-3 bottom__sec w-full pt-4">
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex ___desc items-center">
                            <div class="flex flex-col __desc__names flex-start items-start gap-1">
                                <div v-if="user.location" class="flex address  "> <icon name="location" class="w-4 h-4 mr-2 icon" /> {{ user.location }}</div>
                                <div v-if="user.email" class="flex email  "> <icon name="email" class="w-4 h-4 mr-2 icon" /> {{ user.email }}</div>
                                <div v-if="user.website" class="flex address  "> <icon name="website" class="w-4 h-4 mr-2 icon" /> {{ user.website }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 8" class="card__entry">
        <div class="flex justify-between card__content card_portrait_9">
            <div class="flex flex-col w-full main__content">
                <div class="flex flex-col items-center photo_name pt-8">
                    <div class=" flex justify-center items-center qr_code">
                        <div class="qr__image" v-html="user.image"></div>

                    </div>
                    <div class="flex flex-col items-center pt-7 justify-center">
                        <div v-if="user.name" class="name"> {{ user.name }}</div>
                        <div v-if="user.profession" class="profession"> {{ user.profession }}</div>
                        <div class="flex ___desc items-center pt-7">
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
    <div v-else-if="id === 9" class="card__entry">
        <div class="flex justify-between card__content card_portrait_10">
            <div class="flex flex-col w-full main__content relative">
                <div class="flex flex-col gap-5 items-center justify-center round_circle pt-5 w-full">
                    <div  class="text-lg uppercase font-light __company"> {{ user.company }}</div>
                    <div class=" flex justify-center items-center qr_code">
                        <div class="qr__image" v-html="user.image"></div>

                    </div>
                </div>
                <div class="flex flex-col justify-start items-start pl-[22px] photo_name pt-12 w-full">
                    <div v-if="user.name" class="text-xl font-bold"> {{ user.name }}</div>
                    <div v-if="user.profession" class="tracking-[3px] text-xs uppercase font-light"> {{ user.profession }}</div>
                </div>
                <div class="flex flex-col justify-center items-center gap-3 bottom__sec w-full pt-8">
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex ___desc items-center">
                            <div class="flex flex-col __desc__names flex-start items-start gap-2">
                                <div v-if="user.phone" class="flex phone  "> <icon name="phone" class="w-4 h-4 mr-2 icon" /> {{ user.phone }}</div>
                                <div v-if="user.location" class="flex address  "> <icon name="location" class="w-4 h-4 mr-2 icon" /> {{ user.location }}</div>
                                <div v-if="user.email" class="flex email  "> <icon name="email" class="w-4 h-4 mr-2 icon" /> {{ user.email }}</div>
                                <div v-if="user.website" class="flex address  "> <icon name="website" class="w-4 h-4 mr-2 icon" /> {{ user.website }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 10" class="card__entry">
        <div class="flex justify-between card__content card_portrait_11">
            <div class="flex flex-col w-full main__content relative">
                <div class="flex flex-col gap-3 items-center justify-center text-center round_circle pt-2 w-full">
                    <div  class="text-lg uppercase font-light text-center text-white __company"> {{ user.company }}</div>
                    <div class=" flex justify-center items-center qr_code">
                        <div class="qr__image" v-html="user.image"></div>

                    </div>
                </div>
                <div class="flex flex-col justify-start items-start pl-[22px] photo_name pt-16 w-full">
                    <div v-if="user.name" class="text-xl font-bold text-[#6190af]"> {{ user.name }}</div>
                    <div v-if="user.profession" class="tracking-[3px] text-xs uppercase font-light"> {{ user.profession }}</div>
                </div>
                <div class="flex flex-col justify-start items-start gap-3 bottom__sec w-full pt-5 pl-[22px]">
                    <div class="flex flex-col items-start justify-start">
                        <div class="flex ___desc items-center">
                            <div class="flex flex-col __desc__names flex-start items-start gap-2">
                                <div v-if="user.phone" class="flex phone "> <icon name="phone" class="w-4 h-4 mr-2 icon" /> {{ user.phone }}</div>
                                <div v-if="user.location" class="flex address  "> <icon name="location" class="w-4 h-4 mr-2 icon" /> {{ user.location }}</div>
                                <div v-if="user.email" class="flex email  "> <icon name="email" class="w-4 h-4 mr-2 icon" /> {{ user.email }}</div>
                                <div v-if="user.website" class="flex address  "> <icon name="website" class="w-4 h-4 mr-2 icon" /> {{ user.website }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 11" class="card__entry">
        <div class="flex justify-between card__content card_portrait_12">
            <div class="flex flex-col w-full main__content relative">
                <div class="flex flex-col justify-start items-start pl-[22px] photo_name pt-24 w-full">
                    <div v-if="user.name" class="text-xl font-bold "> {{ user.name }}</div>
                    <div v-if="user.profession" class="tracking-[3px] text-xs uppercase font-light"> {{ user.profession }}</div>
                </div>
                <div class="flex flex-col justify-start items-start gap-3 bottom__sec w-full pt-5 pl-[22px]">
                    <div class="flex flex-col items-start justify-start">
                        <div class=" flex justify-center items-center qr_code w-full">
                            <div class="qr__image" v-html="user.image"></div>

                        </div>
                        <div class="flex ___desc items-center pt-6">
                            <div class="flex flex-col __desc__names flex-start items-start gap-2">
                                <div v-if="user.phone" class="flex phone "> <icon name="phone" class="w-4 h-4 mr-2 icon" /> {{ user.phone }}</div>
                                <div v-if="user.location" class="flex address  "> <icon name="location" class="w-4 h-4 mr-2 icon" /> {{ user.location }}</div>
                                <div v-if="user.email" class="flex email  "> <icon name="email" class="w-4 h-4 mr-2 icon" /> {{ user.email }}</div>
                                <div v-if="user.website" class="flex address  "> <icon name="website" class="w-4 h-4 mr-2 icon" /> {{ user.website }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 12" class="card__entry">
        <div class="flex justify-between card__content card_portrait_13">
            <div class="flex flex-col w-full main__content text-[#3c3431] relative">
                <div class="flex items-center justify-center round_circle pt-7 w-full">
                    <div  class="text-lg uppercase font-light __company"> {{ user.company }}</div>
                </div>
                <div class="flex flex-col justify-center items-center photo_name pt-5 w-full">
                    <div v-if="user.name" class="text-xl font-bold text-[#1a3761]"> {{ user.name }}</div>
                    <div v-if="user.profession" class="tracking-[3px] text-xs uppercase font-light"> {{ user.profession }}</div>
                </div>
                <div class="flex justify-center items-center w-full pt-2">
                    <div v-if="user.phone" class="flex phone text-xs font-light pt-2 h-5 w-full justify-center items-center"> <icon name="phone" class="w-3 h-3 mr-1 icon" /> {{ user.phone }}</div>
                </div>
                <div class="flex flex-col justify-center items-center gap-3 bottom__sec w-full pt-4">
                    <div class=" flex justify-center items-center qr_code">
                        <div class="qr__image" v-html="user.image"></div>

                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex ___desc items-center">
                            <div class="flex flex-col __desc__names flex-start items-start gap-1">
                                <div v-if="user.location" class="flex address  "> <icon name="location" class="w-4 h-4 mr-2 icon" /> {{ user.location }}</div>
                                <div v-if="user.email" class="flex email  "> <icon name="email" class="w-4 h-4 mr-2 icon" /> {{ user.email }}</div>
                                <div v-if="user.website" class="flex address  "> <icon name="website" class="w-4 h-4 mr-2 icon" /> {{ user.website }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 13" class="card__entry">
        <div class="flex justify-between card__content card_portrait_14">
            <div class="flex flex-col w-full main__content relative">
                <div class="flex items-center justify-center round_circle pt-7 w-full">
                    <div  class="text-lg uppercase font-light __company"> {{ user.company }}</div>
                </div>
                <div class="flex flex-col justify-center items-center photo_name pt-5 w-full">
                    <div v-if="user.name" class="text-xl font-bold"> {{ user.name }}</div>
                    <div v-if="user.profession" class="tracking-[3px] text-xs uppercase font-light"> {{ user.profession }}</div>
                </div>
                <div class="flex justify-center items-center w-full pt-2">
                    <div v-if="user.phone" class="flex phone text-xs font-light pt-2 h-5 w-full justify-center items-center"> <icon name="phone" class="w-3 h-3 mr-1 icon" /> {{ user.phone }}</div>
                </div>
                <div class="flex flex-col justify-center items-center gap-3 bottom__sec w-full pt-4">
                    <div class=" flex justify-center items-center qr_code">
                        <div class="qr__image" v-html="user.image"></div>

                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex ___desc items-center">
                            <div class="flex flex-col __desc__names flex-start items-start gap-1">
                                <div v-if="user.location" class="flex address  "> <icon name="location" class="w-4 h-4 mr-2 icon" /> {{ user.location }}</div>
                                <div v-if="user.email" class="flex email  "> <icon name="email" class="w-4 h-4 mr-2 icon" /> {{ user.email }}</div>
                                <div v-if="user.website" class="flex address  "> <icon name="website" class="w-4 h-4 mr-2 icon" /> {{ user.website }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else-if="id === 14" class="card__entry">
        <div class="flex justify-between card__content card_portrait_15">
            <div class="flex flex-col w-full main__content relative">
                <div class="flex items-center justify-center round_circle pt-7 w-full">
                    <div  class="text-lg uppercase font-light __company"> {{ user.company }}</div>
                </div>
                <div class="flex flex-col justify-center items-center photo_name pt-5 w-full">
                    <div v-if="user.name" class="text-xl font-bold"> {{ user.name }}</div>
                    <div v-if="user.profession" class="tracking-[3px] text-xs uppercase font-light"> {{ user.profession }}</div>
                </div>
                <div class="flex justify-center items-center w-full pt-2">
                    <div v-if="user.phone" class="flex phone text-xs font-light pt-2 h-5 w-full justify-center items-center"> <icon name="phone" class="w-3 h-3 mr-1 icon" /> {{ user.phone }}</div>
                </div>
                <div class="flex flex-col justify-center items-center gap-3 bottom__sec w-full pt-4">
                    <div class=" flex justify-center items-center qr_code">
                        <div class="qr__image" v-html="user.image"></div>

                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex ___desc items-center">
                            <div class="flex flex-col __desc__names flex-start items-start gap-1">
                                <div v-if="user.location" class="flex address  "> <icon name="location" class="w-4 h-4 mr-2 icon" /> {{ user.location }}</div>
                                <div v-if="user.email" class="flex email  "> <icon name="email" class="w-4 h-4 mr-2 icon" /> {{ user.email }}</div>
                                <div v-if="user.website" class="flex address  "> <icon name="website" class="w-4 h-4 mr-2 icon" /> {{ user.website }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else class="card__entry" :class="'cid_'+id">
        <div class="flex justify-between card__content card_portrait" :style="ds">
            <div class="flex flex-col w-full main__content relative">
                <div class="flex items-center justify-center round_circle pt-7 w-full">
                    <div  class="text-lg uppercase font-light __company"> {{ user.company }}</div>
                </div>
                <div class="flex flex-col justify-center items-center photo_name pt-5 w-full">
                    <div v-if="user.name" class="text-xl font-bold"> {{ user.name }}</div>
                    <div v-if="user.profession" class="tracking-[3px] text-xs uppercase font-light"> {{ user.profession }}</div>
                </div>
                <div class="flex justify-center items-center w-full pt-2">
                    <div v-if="user.phone" class="flex phone text-xs font-light pt-2 h-5 w-full justify-center items-center"> <icon name="phone" class="w-3 h-3 mr-1 icon" /> {{ user.phone }}</div>
                </div>
                <div class="flex flex-col justify-center items-center gap-3 bottom__sec w-full pt-4">
                    <div class=" flex justify-center items-center qr_code">
                        <div class="qr__image" v-html="user.image"></div>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex ___desc items-center">
                            <div class="flex flex-col __desc__names flex-start items-start">
                                <div v-if="user.location" class="flex address  "> <icon name="location" class="w-4 h-4 mr-2 icon" /> {{ user.location }}</div>
                                <div v-if="user.email" class="flex email  "> <icon name="email" class="w-4 h-4 mr-2 icon" /> {{ user.email }}</div>
                                <div v-if="user.website" class="flex address  "> <icon name="website" class="w-4 h-4 mr-2 icon" /> {{ user.website }}</div>
                            </div>
                        </div>
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
