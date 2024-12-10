use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToScorecardsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('scorecards', function (Blueprint $table) {
            $table->integer('progress_q1')->nullable();
            $table->integer('progress_q2')->nullable();
            $table->integer('progress_q3')->nullable();
            $table->integer('progress_q4')->nullable();
            $table->string('source_of_funds')->nullable();
            $table->text('comments')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('scorecards', function (Blueprint $table) {
            $table->dropColumn(['progress_q1', 'progress_q2', 'progress_q3', 'progress_q4', 'source_of_funds', 'comments']);
        });
    }
}
