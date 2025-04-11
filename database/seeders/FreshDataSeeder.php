<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Conversation;
use App\Models\Department;
use App\Models\Faq;
use App\Models\KnowledgeBase;
use App\Models\Message;
use App\Models\Note;
use App\Models\Organization;
use App\Models\Priority;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FreshDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $this->call([
            FrontPageSeeder::class,
        ]);

        $users = User::limit(10)->get();

        DB::table('organizations')->truncate();
        $organizations = Organization::factory(15)->create();

        DB::table('contacts')->truncate();
        Contact::factory(20)->create()->each(function ($contact) use ($organizations) {
            $contact->update(['organization_id' => $organizations->random()->id]);
        });

        DB::table('notes')->truncate();
        Note::factory(45)->create()->each(function ($post) use ($users){
            $post->update(['user_id' => $users->random()->id]);
        });

        DB::table('types')->truncate();
        $types = Type::factory(4)->create();

        DB::table('knowledge_base')->truncate();
        KnowledgeBase::factory(25)->create()->each(function ($kb) use($types){
            $kb->update(['type_id' => '1']);
        });

        DB::table('faqs')->truncate();
        Faq::factory(30)->create();

        DB::table('posts')->truncate();
        Blog::factory(30)->create()->each(function ($post) use ($types, $users){
            $post->update(['type_id' => $types->random()->id]);
            $post->update(['author_id' => $users->random()->id]);
        });

    }
}
