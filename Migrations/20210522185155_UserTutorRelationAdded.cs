using Microsoft.EntityFrameworkCore.Migrations;

namespace CentrumWiedzy.Migrations
{
    public partial class UserTutorRelationAdded : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropForeignKey(
                name: "FK_AspNetUsers_Tutors_TutorId",
                table: "AspNetUsers");

            migrationBuilder.DropIndex(
                name: "IX_AspNetUsers_TutorId",
                table: "AspNetUsers");

            migrationBuilder.DropColumn(
                name: "Email",
                table: "Tutors");

            migrationBuilder.DropColumn(
                name: "Name",
                table: "Tutors");

            migrationBuilder.DropColumn(
                name: "Surname",
                table: "Tutors");

            migrationBuilder.DropColumn(
                name: "FacultyId",
                table: "AspNetUsers");

            migrationBuilder.DropColumn(
                name: "TutorId",
                table: "AspNetUsers");

            migrationBuilder.AlterColumn<string>(
                name: "UserId",
                table: "Tutors",
                nullable: true,
                oldClrType: typeof(int),
                oldType: "int");

            migrationBuilder.CreateIndex(
                name: "IX_Tutors_UserId",
                table: "Tutors",
                column: "UserId",
                unique: true,
                filter: "[UserId] IS NOT NULL");

            migrationBuilder.AddForeignKey(
                name: "FK_Tutors_AspNetUsers_UserId",
                table: "Tutors",
                column: "UserId",
                principalTable: "AspNetUsers",
                principalColumn: "Id",
                onDelete: ReferentialAction.Restrict);
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropForeignKey(
                name: "FK_Tutors_AspNetUsers_UserId",
                table: "Tutors");

            migrationBuilder.DropIndex(
                name: "IX_Tutors_UserId",
                table: "Tutors");

            migrationBuilder.AlterColumn<int>(
                name: "UserId",
                table: "Tutors",
                type: "int",
                nullable: false,
                oldClrType: typeof(string),
                oldNullable: true);

            migrationBuilder.AddColumn<string>(
                name: "Email",
                table: "Tutors",
                type: "nvarchar(max)",
                nullable: true);

            migrationBuilder.AddColumn<string>(
                name: "Name",
                table: "Tutors",
                type: "nvarchar(max)",
                nullable: true);

            migrationBuilder.AddColumn<string>(
                name: "Surname",
                table: "Tutors",
                type: "nvarchar(max)",
                nullable: true);

            migrationBuilder.AddColumn<int>(
                name: "FacultyId",
                table: "AspNetUsers",
                type: "int",
                nullable: false,
                defaultValue: 0);

            migrationBuilder.AddColumn<int>(
                name: "TutorId",
                table: "AspNetUsers",
                type: "int",
                nullable: false,
                defaultValue: 0);

            migrationBuilder.CreateIndex(
                name: "IX_AspNetUsers_TutorId",
                table: "AspNetUsers",
                column: "TutorId",
                unique: true);

            migrationBuilder.AddForeignKey(
                name: "FK_AspNetUsers_Tutors_TutorId",
                table: "AspNetUsers",
                column: "TutorId",
                principalTable: "Tutors",
                principalColumn: "Id",
                onDelete: ReferentialAction.Cascade);
        }
    }
}
