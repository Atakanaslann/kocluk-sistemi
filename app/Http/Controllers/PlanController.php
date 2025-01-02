<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class PlanController extends Controller
{
    // Öğrencinin kendi planlarını listele
    public function index()
    {
        $plans = Plan::where('student_id', auth()->id())->get();
        return view('plans.index', compact('plans'));
    }

    // Koçun belirli bir öğrencinin planlarını görüntülemesi
    public function studentPlans($studentId)
    {
        // Koç sadece kendi öğrencilerinin planlarını görebilir
        $student = User::where('id', $studentId)->where('role', 'student')->firstOrFail();
        $plans = Plan::where('student_id', $studentId)->get();

        return view('plans.student_plans', compact('student', 'plans'));
    }

    // Plan oluştur
    public function store(Request $request, $studentId = null)
    {
        $validated = $request->validate([
            'task_name' => 'required|string|max:255',
            'day' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $studentId = $studentId ?? auth()->id(); // Koç veya öğrenci duruma göre atar
        Plan::create(array_merge($validated, ['student_id' => $studentId]));

        return back()->with('success', 'Plan başarıyla oluşturuldu!');
    }

    // Plan güncelle
    public function update(Request $request, $studentId = null, $planId)
    {
        $validated = $request->validate([
            'task_name' => 'required|string|max:255',
            'day' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $plan = Plan::findOrFail($planId);

        // Koçlar yalnızca kendi öğrencilerinin planlarını düzenleyebilir
        if (auth()->user()->role === 'coach' && $plan->student_id !== $studentId) {
            abort(403, 'Bu plan üzerinde işlem yapamazsınız.');
        }

        $plan->update($validated);

        return back()->with('success', 'Plan başarıyla güncellendi!');
    }

    // Plan sil
    public function destroy($studentId = null, $planId)
    {
        $plan = Plan::findOrFail($planId);

        // Koçlar yalnızca kendi öğrencilerinin planlarını silebilir
        if (auth()->user()->role === 'coach' && $plan->student_id !== $studentId) {
            abort(403, 'Bu plan üzerinde işlem yapamazsınız.');
        }

        $plan->delete();

        return back()->with('success', 'Plan başarıyla silindi!');
    }
}
