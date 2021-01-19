<?php

namespace App\Controller;

use App\Entity\Industry;
use App\Form\IndustryType;
use App\Repository\IndustryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * @Route("/industry")
 */
class IndustryController extends AbstractController
{
    /**
     * @Route("/", name="industry_index", methods={"GET"})
     */
    public function index(IndustryRepository $industryRepository): Response
    {
        return $this->render('industry/index.html.twig', [
            'industries' => $industryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="industry_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $industry = new Industry();
        $form = $this->createForm(IndustryType::class, $industry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($industry);
            $entityManager->flush();

            return $this->redirectToRoute('industry_index');
        }

        return $this->render('industry/new.html.twig', [
            'industry' => $industry,
            'form' => $form->createView(),
        ]);
    }
	
	 private function getData(IndustryRepository $industryRepository): array
    {
        /**
         * @var $user User[]
         */
		 //$industriesRepository=new IndustriesRepository();
        $list = [];
        $industries = $industryRepository->reports();

        foreach ($industries as $industry2) {
			//unset($industry['ind_id']);
            $list[] = [
				$industry2['id'],
                $industry2['name'],
                $industry2['kebele'],
                $industry2['location'],
                $industry2['house_no'],
                $industry2['phone_no'],
                $industry2['r_year'],
                $industry2['icatagory'],
                $industry2['iwork_type'],
                $industry2['iorganized_type'],
                $industry2['tin_no'],
                $industry2['scapital_amount'],
                $industry2['scapital_source'],
                $industry2['ccapital_cash'],
                $industry2['ccapital_asset'],
				$industry2['ccapital_cash']+$industry2['ccapital_asset'],				
                $industry2['progress_level'],
                $industry2['imember_male'],
                $industry2['imember_female'],				
				$industry2['imember_male'] + $industry2['imember_female'],				
				$industry2['imember16_to29'],
                $industry2['imember_above29'],					
				$industry2['imember16_to29'] + $industry2['imember_above29'],				
                $industry2['idisabled_member_male'],
                $industry2['idisabled_member_female'],					
				$industry2['idisabled_member_male'] + $industry2['idisabled_member_female'],				
                $industry2['bemployee_male'],
                $industry2['bemployee_female'],						
				$industry2['bemployee_male'] + $industry2['bemployee_female'],				
                $industry2['bfixed_term_male'],
                $industry2['bfixed_term_female'],					
				$industry2['bfixed_term_male'] + $industry2['bfixed_term_female'],			
                $industry2['bcontrat_male'],
                $industry2['bcontrat_female'],						
				$industry2['bcontrat_male'] + $industry2['bcontrat_female'],				
                $industry2['cemployee_male'],
                $industry2['cemployee_female'],						
				$industry2['cemployee_male'] + $industry2['cemployee_female'],				
                $industry2['cfixed_term_male'],
                $industry2['cfixed_term_female'],						
				$industry2['cfixed_term_male'] + $industry2['cfixed_term_female'],				
                $industry2['ccontrat_male'],
                $industry2['ccontrat_female'],
				$industry2['ccontrat_male'] + $industry2['ccontrat_female'],
			]
            ;
        }
        return $list;
    }
	/**
     * @Route("/export2", name="export2")
     */
    public function export2(IndustryRepository $industryRepository): Response
    {
         $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setTitle('User List');
		$sheet->getCell('A1')->setValue('ተ.ቁ');
        $sheet->getCell('B1')->setValue('የኢንደስትሪው ስም');
		 $sheet->getCell('C1')->setValue('ቀበሌ ');
		 $sheet->getCell('D1')->setValue('ኢንደስትሪው የሚገኝበት/መንደር ');
		 $sheet->getCell('E1')->setValue('የቤት ቁጥር ');
		 $sheet->getCell('F1')->setValue('ስልክ ቁጥር ');
		 $sheet->getCell('G1')->setValue('የተመሰረተበት ዘመን(ዓ።ም) ');
		 $sheet->getCell('H1')->setValue('የተሰማራበት ኑኡስ ዘርፍ ');
		 $sheet->getCell('I1')->setValue('የተሰማራበት የስራ ዘርፍ ');
		 $sheet->getCell('J1')->setValue('የአደራጃጀት ዓይነት ');
		 $sheet->getCell('K1')->setValue('የግብር ከፋይነት መለያ ቁጥር ');
		 $sheet->getCell('L1')->setValue('ሲመሠረት የነበረው ካፒታል መጠን ');
		 $sheet->getCell('M1')->setValue('ምንጭ ');
		 $sheet->getCell('N1')->setValue('አሁን ያለው ካፒታል በጥሬ ገንዘብ ብር ');
		 $sheet->getCell('O1')->setValue('በቋሚና ተንቀሳቃሽ ንብረቶች ግምት ብር ');
		  $sheet->getCell('P1')->setValue('ድምር  ');
		 $sheet->getCell('Q1')->setValue('የእድገት  ደረጃ ');
		 $sheet->getCell('R1')->setValue('የኢንደስትሪው አባላት ብዛት ወንድ ');
		 $sheet->getCell('S1')->setValue('የኢንደስትሪው አባላት ብዛት ሴት  ');
		 $sheet->getCell('T1')->setValue('ድምር  '); 

		 $sheet->getCell('U1')->setValue('የኢንደስትሪው አባላት ብዛት ከ16-29 ');
		 $sheet->getCell('V1')->setValue('የኢንደስትሪው አባላት ብዛት ከ29 በላይ ');
		 $sheet->getCell('W1')->setValue('ድምር  ');
		 $sheet->getCell('X1')->setValue('የአካል ወንድ ');
		 $sheet->getCell('Y1')->setValue('የአካል ሴት ');
		 $sheet->getCell('Z1')->setValue('ድምር  ');
		 $sheet->getCell('AA1')->setValue('የኢንደስትሪው ስራ ሲጀምር የነበረው የሰው/ ሰራተኛ ብዛት ወንድ ');
		 $sheet->getCell('AB1')->setValue('የኢንደስትሪው ስራ ሲጀምር የነበረው የሰው/ ሰራተኛ ብዛት ሴት');
		  $sheet->getCell('AC1')->setValue('ድምር  ');
		 $sheet->getCell('AD1')->setValue('የኢንደስትሪው ስራ ሲጀምር የነበረው የሰው/ ቋሚ ቅጥር  ወንድ ');
		 $sheet->getCell('AE1')->setValue('የኢንደስትሪው ስራ ሲጀምር የነበረው የሰው/ ቋሚ ቅጥር ሴት ');
		 $sheet->getCell('AF1')->setValue('ድምር  ');
		 $sheet->getCell('AG1')->setValue('የኢንደስትሪው ስራ ሲጀምር የነበረው የሰው/ ጊዜያዊ ቅጥር ወንድ ');
		 $sheet->getCell('AH1')->setValue('የኢንደስትሪው ስራ ሲጀምር የነበረው የሰው/ ጊዜያዊ ቅጥር ሴት ');
		 $sheet->getCell('AI1')->setValue('ድምር  ');
		 $sheet->getCell('AJ1')->setValue('የኢንደስትሪው አሁን ያለው የሰው ኃይል የቤተሰብ አባላትን ጨምሮ/ ሰራተኛ ብዛት ወንድ ');
		 $sheet->getCell('AK1')->setValue('የኢንደስትሪው አሁን ያለው የሰው ኃይል የቤተሰብ አባላትን ጨምሮ/ ሰራተኛ ብዛት ሴት ');
		 $sheet->getCell('AL1')->setValue('ድምር  ');
		 $sheet->getCell('AM1')->setValue('የኢንደስትሪው አሁን ያለው የሰው ኃይል የቤተሰብ አባላትን ጨምሮ/ ቋሚ ቅጥር  ወንድ ');
		 $sheet->getCell('AN1')->setValue('የኢንደስትሪው አሁን ያለው የሰው ኃይል የቤተሰብ አባላትን ጨምሮ/ ቋሚ ቅጥር  ሴት ');
		 $sheet->getCell('AO1')->setValue('ድምር  ');
		 $sheet->getCell('AP1')->setValue('ኢንደስትሪው አሁን ያለው የሰው ኃይል የቤተሰብ አባላትን ጨምሮ/ ጊዜያዊ ቅጥር  ወንድ ');
		 $sheet->getCell('AQ1')->setValue('የኢንደስትሪው አሁን ያለው የሰው ኃይል የቤተሰብ አባላትን ጨምሮ/ ጊዜያዊ ቅጥር  ሴት ');
		 $sheet->getCell('AR1')->setValue('ድምር  ');
		 $from = "A1"; // or any value
		 $to = "AR1"; // or any value
		 $sheet->getStyle("$from:$to")->getFont()->setBold( true );
		 $sheet->getCell('AR1')->setValue('ድምር  ');
        // Increase row cursor after header write
            $sheet->fromArray($this->getData( $industryRepository),null, 'A2', true);
        
		ob_clean();
        $writer = new Xlsx($spreadsheet);

       // $writer->save('Industries report.xlsx');
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Industries report.xlsx"');
        $writer->save('php://output');
        //return $this->redirectToRoute('industry_index');
    }

    /**
     * @Route("/{id}", name="industry_show", methods={"GET"})
     */
    public function show(Industry $industry): Response
    {
        return $this->render('industry/show.html.twig', [
            'industry' => $industry,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="industry_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Industry $industry): Response
    {
        $form = $this->createForm(IndustryType::class, $industry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('industry_index');
        }

        return $this->render('industry/edit.html.twig', [
            'industry' => $industry,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="industry_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Industry $industry): Response
    {
        if ($this->isCsrfTokenValid('delete'.$industry->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($industry);
            $entityManager->flush();
        }

        return $this->redirectToRoute('industry_index');
    }
	

}
