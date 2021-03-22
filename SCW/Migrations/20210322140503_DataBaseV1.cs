using Microsoft.EntityFrameworkCore.Migrations;

namespace SCW.Migrations
{
    public partial class DataBaseV1 : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropForeignKey(
                name: "FK_Faculties_Lectuers_LectuerId",
                table: "Faculties");

            migrationBuilder.DropIndex(
                name: "IX_Materials_SubjectId",
                table: "Materials");

            migrationBuilder.DropIndex(
                name: "IX_Faculties_LectuerId",
                table: "Faculties");

            migrationBuilder.DropColumn(
                name: "GradeTutor",
                table: "Tutors");

            migrationBuilder.DropColumn(
                name: "LectuerId",
                table: "Subjects");

            migrationBuilder.DropColumn(
                name: "MaterialsId",
                table: "Subjects");

            migrationBuilder.DropColumn(
                name: "GradeLectuer",
                table: "Lectuers");

            migrationBuilder.DropColumn(
                name: "LectuerId",
                table: "Faculties");

            migrationBuilder.AddColumn<int>(
                name: "UserId1",
                table: "Tutors",
                type: "int",
                nullable: true);

            migrationBuilder.CreateTable(
                name: "FacultyLectuer",
                columns: table => new
                {
                    FacultiesID = table.Column<int>(type: "int", nullable: false),
                    LectuersId = table.Column<int>(type: "int", nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_FacultyLectuer", x => new { x.FacultiesID, x.LectuersId });
                    table.ForeignKey(
                        name: "FK_FacultyLectuer_Faculties_FacultiesID",
                        column: x => x.FacultiesID,
                        principalTable: "Faculties",
                        principalColumn: "ID",
                        onDelete: ReferentialAction.Cascade);
                    table.ForeignKey(
                        name: "FK_FacultyLectuer_Lectuers_LectuersId",
                        column: x => x.LectuersId,
                        principalTable: "Lectuers",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.CreateIndex(
                name: "IX_Tutors_UserId1",
                table: "Tutors",
                column: "UserId1");

            migrationBuilder.CreateIndex(
                name: "IX_Materials_SubjectId",
                table: "Materials",
                column: "SubjectId");

            migrationBuilder.CreateIndex(
                name: "IX_FacultyLectuer_LectuersId",
                table: "FacultyLectuer",
                column: "LectuersId");

            migrationBuilder.AddForeignKey(
                name: "FK_Tutors_Users_UserId1",
                table: "Tutors",
                column: "UserId1",
                principalTable: "Users",
                principalColumn: "Id",
                onDelete: ReferentialAction.Restrict);
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropForeignKey(
                name: "FK_Tutors_Users_UserId1",
                table: "Tutors");

            migrationBuilder.DropTable(
                name: "FacultyLectuer");

            migrationBuilder.DropIndex(
                name: "IX_Tutors_UserId1",
                table: "Tutors");

            migrationBuilder.DropIndex(
                name: "IX_Materials_SubjectId",
                table: "Materials");

            migrationBuilder.DropColumn(
                name: "UserId1",
                table: "Tutors");

            migrationBuilder.AddColumn<float>(
                name: "GradeTutor",
                table: "Tutors",
                type: "real",
                nullable: false,
                defaultValue: 0f);

            migrationBuilder.AddColumn<int>(
                name: "LectuerId",
                table: "Subjects",
                type: "int",
                nullable: false,
                defaultValue: 0);

            migrationBuilder.AddColumn<int>(
                name: "MaterialsId",
                table: "Subjects",
                type: "int",
                nullable: false,
                defaultValue: 0);

            migrationBuilder.AddColumn<float>(
                name: "GradeLectuer",
                table: "Lectuers",
                type: "real",
                nullable: false,
                defaultValue: 0f);

            migrationBuilder.AddColumn<int>(
                name: "LectuerId",
                table: "Faculties",
                type: "int",
                nullable: true);

            migrationBuilder.CreateIndex(
                name: "IX_Materials_SubjectId",
                table: "Materials",
                column: "SubjectId",
                unique: true);

            migrationBuilder.CreateIndex(
                name: "IX_Faculties_LectuerId",
                table: "Faculties",
                column: "LectuerId");

            migrationBuilder.AddForeignKey(
                name: "FK_Faculties_Lectuers_LectuerId",
                table: "Faculties",
                column: "LectuerId",
                principalTable: "Lectuers",
                principalColumn: "Id",
                onDelete: ReferentialAction.Restrict);
        }
    }
}
